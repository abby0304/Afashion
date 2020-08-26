<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = [
        'comment_des', 'user_id', 'article_id'
    ];
    //
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function articles()
    {
        return $this->belongsTo(article::class,'article_id');
    }

    
}
