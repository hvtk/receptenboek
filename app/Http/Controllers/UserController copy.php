<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;

class UserController extends Controller
{

    public function insertRecord()
    {
        $account = new Account();

        $account->full_name = 'fullName';
        $account->email = 'email';
        $account->phone = 'phone';
        $account->street = 'street';
        $account->city = 'city';
        $account->state = 'state';
        $account->zip_code = 'zipCode';

        $user = new User();
        $user->name = "Henk";
        $user->email = "henk@gmail.com";
        $user->password = encrypt('secret');
        $user->save();
        $user->account()->save($account);
        return "Record has been created successfully!";
    }

    public function fetchAccountByUser($id)
    {
        $account = User::find($id)->account;
        return $account;
    }
}
