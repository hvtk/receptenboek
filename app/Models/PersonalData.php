<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PersonalData extends Model
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

    //Get the User that owns the PersonalData
    public function user()
    {
       return $this->belongsTo(User::class);
        //Or return $this->belongsTo('App\Models\User');
    }
}
