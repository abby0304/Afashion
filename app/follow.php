<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class follow extends Model
{
     //
     protected $fillable = [
       'user_id', 'user_follow'
    ];

     public function users()
     {
         return $this->belongsTo(User::class, 'user_id');
     }

}
