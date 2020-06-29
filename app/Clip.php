<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clip extends Model
{
    protected $guarded = [];

    public function podcast()
      {
        return $this->belongsTo(Podcast::class);
      }

    public function getRouteKeyName()
      {
        return 'slug';
      }

}
