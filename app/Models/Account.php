<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = "accounts";

    //Get the user that owns the account
  //  public function user()
   // {
  //     return $this->belongsTo(User::class);
        //Or return $this->belongsTo('App\User');
 //   }

    //Get the admin that owns the account
    public function admin()
    {
       return $this->belongsTo(Admin::class);
        //Or return $this->belongsTo('App\Admin');
    }
}