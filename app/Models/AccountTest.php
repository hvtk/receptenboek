<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

//Made for testing one to one relationship.
//Used the UserTestController/AccountTest and User model
//also used the accout_tests_table and user_table

class AccountTest extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'phone',
        'street',
        'city',
        'state',
        'zip_code',
    ];

    //Get the usertest that owns the accountTest
    public function user()
    {
       return $this->belongsTo(User::class);
        //Or return $this->belongsTo('App\Models\User');
    }
}
