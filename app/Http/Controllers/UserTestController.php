<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountTest;
use App\Models\User;

//Made for testing one to one relationship.
//used the AccountTest and User model
//also used the accout_tests_table and user_table

class UserTestController extends Controller
{

    public function insertRecord()
    {
        $accountTest = new AccountTest();

        $accountTest->full_name = 'Henk';
        $accountTest->email = 'henk@gmail.com';
        $accountTest->phone = '0647123326';
        $accountTest->street = 'street';
        $accountTest->city = 'city';
        $accountTest->state = 'state';
        $accountTest->zip_code = 'zipCode';

        $userTest = new User();
        $userTest->name = "Henk";
        $userTest->email = "henk@gmail.com";
        $userTest->password = encrypt('secret');
        $userTest->save();
        $userTest->accountTest()->save($accountTest);
        return "Record has been created successfully!";
    }

    public function fetchAccountByUser($id)
    {
        $accountTest = User::find($id)->accountTest;
        return $accountTest;
    }
}
