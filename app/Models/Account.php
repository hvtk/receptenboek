<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Account extends Model
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

    //Get the user that owns the account
    public function user()
    {
        return $this->belongsTo(User::class);
        //Or return $this->belongsTo('App\User');
    }
}