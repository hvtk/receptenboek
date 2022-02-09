<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\PersonalData;


class UserController extends Controller
{
    public function login() {
        return view('authenticate.login');
    }

    public function register() {
        return view('authenticate.register');
    }

    Protected $PersonalDataController;
    public function __construct(PersonalDataController $PersonalDataController)
    {
        $this->PersonalDataController = $PersonalDataController;
    }

    public function save(Request $request) {
        //POST
        $personalData = new PersonalData();

        $personalData->full_name = strip_tags($request->input('fullName'));
        $personalData->email = strip_tags($request->input('email'));
        $personalData->phone = strip_tags($request->input('phone'));
        $personalData->street = strip_tags($request->input('street'));
        $personalData->city = strip_tags($request->input('city'));
        $personalData->state = strip_tags($request->input('state'));
        $personalData->zip_code = strip_tags($request->input('zipCode'));

        $personalData = $this->PersonalDataController->store($save);

        //validate requests
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);

        //insert data into user-database
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        $save->personalData()->save($personalData);

        if($save) {
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
    
    public function logout() {
        if(session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('authenticate.register');
        }
    }

    public function dashboard() {
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin.dashboard', $data);
    }

    public function settings() {
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin.settings', $data);
    }

    public function profile() {
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('admin.profile', $data);
    }

    public function staff() {
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        return view('admin.staff', $data);
    }
}
