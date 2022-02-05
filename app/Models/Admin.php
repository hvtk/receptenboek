<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    //Get the account records associated with the admin.
    public function accountTest()
    {
        return $this->hasOne(AccountTest::class);
        //Or retrun $this->hasOne('App\Models\AccountTest');
    }
}
