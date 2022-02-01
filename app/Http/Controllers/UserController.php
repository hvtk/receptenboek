<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;

class UserController extends Controller
{

    public function save(Request $request)
    {
        //validate requests account
        $request->validate( [
            'fullName' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipCode' => 'required',
        ]);

        // POST
        $account = new Account();

        $account->full_name = strip_tags($request->input('fullName'));
        $account->email = strip_tags($request->input('email'));
        $account->phone = strip_tags($request->input('phone'));
        $account->street = strip_tags($request->input('street'));
        $account->city = strip_tags($request->input('city'));
        $account->state = strip_tags($request->input('state'));
        $account->zip_code = strip_tags($request->input('zipCode'));

        //validate requests user
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);

         // POST
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $save = $user->account()->save($account);

        if($save) {
            return back()->with('success', 'New User has been successfully added to database.');
        }
        else {
            return back()->with('fail', 'Something went wrong, try again later.');
        }
    }

    public function check(Request $request) {

        //validate requests
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);

        $userInfo = User::where('email','=', $request->email)->first();

        if(!$userInfo) {
            return back()->with('fail', 'We do not recognize your email address.');
        }
        else {
            //check password
            if(Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('admin/dashboard');
            }
            else {
                return back()->with('fail', 'Incorrect password');
            }
        }  
    }


    public function fetchAccountByUser($id)
    {
        $account = User::find($id)->account;
        return $account;
    }
}
