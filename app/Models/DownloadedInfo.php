<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DownloadedInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title', 
        'description', 
        'image'
    ];

    //Get the User that owns the DownloadedInfo
    public function user()
    {
       return $this->belongsTo(User::class);//Laravel things it is user_id looking to the function name
        //Or return $this->belongsTo('App\Models\User');
    }
}
