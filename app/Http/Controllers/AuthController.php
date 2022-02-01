<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        return view('authenticate.login');
    }

    public function register() {
        return view('authenticate.register');
    }

    public function logout() {
        if(session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('authenticate.register');
        }
    }
}
