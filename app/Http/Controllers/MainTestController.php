<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class MainTestController extends Controller
{
    public function login() {
        return view('authenticate.login');
    }

    public function register() {
        return view('authenticate.register');
    }

    public function save(Request $request) {
        //POST

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

        //validate requests
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:5|max:12'
        ]);

        //insert data into admin-database
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();
        $admin->account()->save($account);

        if($admin) {
            return back()->with('success', 'New User has been successfully added to database.');
        }
        else {
            return back()->with('fail', 'Something went wrong, try again later.');
        }
    }

    public function check(Request $request) {
        //POST

        //validate requests
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);

        $userInfo = Admin::where('email','=', $request->email)->first();

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
    
    public function logout() {
        if(session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('authenticate.register');
        }
    }

    public function dashboard() {
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.dashboard', $data);
    }

    public function settings() {
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.settings', $data);
    }

    public function profile() {
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.profile', $data);
    }

    public function staff() {
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.staff', $data);
    }

}
