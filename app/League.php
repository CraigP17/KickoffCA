<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
  protected $guarded = [];

  public function getRouteKeyName()
    {
      return 'slug';
    }
}
