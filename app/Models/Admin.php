<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    //Get the account records associated with the user.
    public function account()
    {
        return $this->hasOne(Account::class);
        //Or retrun $this->hasOne('App\Account');
    }
}
