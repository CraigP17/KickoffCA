<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
  protected $guarded = [];

  public function getRouteKeyName()
    {
      return 'slug';
    }
}
