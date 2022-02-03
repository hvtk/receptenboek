<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountTest;
use App\Models\UserTest;

//Made for testing one to one relationship.

class UserTestController extends Controller
{

    public function insertRecord()
    {
        $accountTest = new AccountTest();

        $accountTest->full_name = 'Mirjam';
        $accountTest->email = 'mirjam@gmail.com';
        $accountTest->phone = '0647123326';
        $accountTest->street = 'Novalaan 1';
        $accountTest->city = 'Ede';
        $accountTest->state = 'gelderland';
        $accountTest->zip_code = '6717 SV';

        $userTest = new UserTest();
        $userTest->name = "Mirjam";
        $userTest->email = "mirjam@gmail.com";
        $userTest->password = encrypt('secret');
        $userTest->save();
        $userTest->accountTest()->save($accountTest);
        return "Record has been created successfully!";
    }

    public function fetchAccountByUser($id)
    {
        $accountTest = UserTest::find($id)->accountTest;
        return $accountTest;
    }
}
