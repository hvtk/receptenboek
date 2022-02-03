<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountTest extends Model
{
    use HasFactory;

    //Get the usertest that owns the accountTest
    public function userTest()
    {
       return $this->belongsTo(UserTest::class);
        //Or return $this->belongsTo('App\Models\UserTest');
    }
}
