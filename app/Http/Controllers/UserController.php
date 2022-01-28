<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Account;
use Hash;

class UserController extends Controller
{
    //
    public function addUserAccount()
    {
        $user = new User;
        $user->name = "Test Name";
        $user->email = "test@mnp.com";
        $user->password = Hash::make("12345678");
        $user->save();

        $account = new Account;
        $account->full_name = strip_tags($request->input('fullName'));
        $account->email = strip_tags($request->input('email'));
        $account->phone = strip_tags($request->input('phone'));
        $account->street = strip_tags($request->input('street'));
        $account->city = strip_tags($request->input('city'));
        $account->state = strip_tags($request->input('state'));
        $account->zip_code = strip_tags($request->input('zipCode'));
        $user->account()->save($account);
    }

    public function index()
    {
        //Get user and account data from User model
        $user = User::find(1);
        var_dump($user->name);
        var_dump($user->account->phone);

        //Get user data from Account model
        $user = Account::find(1)->user;
        dd($user);

        //Get phone number from Account model
        $account = User::find(1)->phone;
        dd($account);
    }

    public function update()
    {
        $user = User::ind(1);

        $user->name = 'Test II';
        $user->account->phone = '987654321';
        $user->push();
    }

    public function delete()
    {
        $user = User::find(1);
        $user->delete();
    }
}
