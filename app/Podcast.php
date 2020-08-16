<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
  protected $guarded = [];

  public function getRouteKeyName()
    {
      return 'slug';
    }

  public function pods()
    {
      return $this->hasMany('App\Pod', 'slug', 'slug')->orderBy('date', 'desc');
    }

  public function addPod($pods)
    {
      //dd($pods['name']);
      // $this->pods()->create($pods);
      return Pod::create([
        'name' => $pods['name'],
        'group_name' => $this['name'],
        'description' => $pods['description'],
        'time' => $pods['time'],
        'date' => $pods['date'],
        'slug' => $this['slug']
      ]);
    }
}
