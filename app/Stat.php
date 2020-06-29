<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
  protected $guarded = [];

  public function getRouteKeyName()
    {
      return 'slug';
    }
}
