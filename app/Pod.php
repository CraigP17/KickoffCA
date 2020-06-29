<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pod extends Model
{
  protected $fillable = ['name', 'group_name', 'description', 'date', 'slug'];

  // public function getRouteKeyName()
  //   {
  //     return 'slug';
  //   }

  public function podcast()
    {
      return $this->belongsTo(Podcast::class);
    }
}
