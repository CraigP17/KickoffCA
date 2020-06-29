<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
      {
        return 'slug';
      }
    //public function approvedUsers()
    //  {
    //    return $this->hasMany('App\User')->where('approved', 1)->orderBy('email');
    //  }

    // public function latestPost()
    //   {
    //     return $this->hasOne(\App\Post::class)->latest();
    //   }
}
