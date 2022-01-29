<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;

class SiteController extends Controller
{
    //It will find account delails value by user_id. One to one.
    public function getAccount($user_id)
    {
        //Passing user id into find()
        return User::find($user_id)->account;
    }

    //It will find user details by account id. Inverse of one to one / belongs to.
    public function getUser($account_id)
    {
        //Passing account id info find()
        return Account::find($account_id)->user;
    }
}
