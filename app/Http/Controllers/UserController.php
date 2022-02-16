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
        

        //validate requests
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);

        $personalData = new PersonalData();

        //insert data into user-database
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        
        $result = $user->save();

        $user->personalData()->save($personalData);

        if($result) {
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
                $request->session()->put('LoggedUser', $userInfo->userId);
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
        $data = ['LoggedUserInfo'=>User::where('userId','=', session('LoggedUser'))->first()];
        return view('admin.dashboard', $data);
    }

    public function settings() {
        $data = ['LoggedUserInfo'=>User::where('userId','=', session('LoggedUser'))->first()];
        return view('admin.settings', $data);
    }

    public function profile() {
        $data = ['LoggedUserInfo'=>User::where('userId','=', session('LoggedUser'))->first()];
        return view('admin.profile', $data);
    }

    public function staff() {
        $data = ['LoggedUserInfo'=>user::where('userId','=', session('LoggedUser'))->first()];
        return view('admin.staff', $data);
    }
}
