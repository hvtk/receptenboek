<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;

//Made for testing one to one relationship.

class UserTestController extends Controller
{

    public function insertRecord()
    {
        $account = new Account();

        $account->full_name = 'Mirjam';
        $account->email = 'mirjam@gmail.com';
        $account->phone = '0647123326';
        $account->street = 'Novalaan 1';
        $account->city = 'Ede';
        $account->state = 'gelderland';
        $account->zip_code = '6717 SV';

        $user = new User();
        $user->name = "Mirjam";
        $user->email = "mirjam@gmail.com";
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
