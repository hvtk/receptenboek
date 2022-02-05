<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

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

    //Get the admin that owns the accountTest
    public function admin()
    {
       return $this->belongsTo(Admin::class);
        //Or return $this->belongsTo('App\Models\Admin');
    }
}
