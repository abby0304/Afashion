<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_article', 'description', 'img1', 'img2', 'img3', 'img4', 'img5', 'video1', 'video2', 'video3', 'user_id', 'activo'
    ];

    //
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments()
    {
        return $this->hasMany(comment::class);
    }

    public function hearts()
    {
        return $this->hasMany(heart::class);
    }
}
