<?php

namespace App\Http\Controllers;

use App\Pod;
use App\Podcast;
use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PodcastsController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $podcasts = Podcast::orderBy('name')->get();
      return view('podcasts.all-podcasts', compact('podcasts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
       return view('podcasts.create-group');
     }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
        'name'=>'required|min:3|max:255',
        'authors'=>'required',
        'description'=>'required|min:3',
        'sport'=>'required|min:1|max:255',
        'profile_pic'=>'required|image|mimes:jpeg,png,jpg,gif',
        'apple'=>'max:255',
        'spotify'=>'max:255',
        'other_link'=>'max:255',
        'other_name'=>'max:255'
      ]);

        $attributes['slug'] = str_slug($attributes['name'], "-");
        unset($attributes['profile_pic']);
        $new_pic_name = rand() . '.' . $request->file('profile_pic')->getClientOriginalName();
        $attributes['dp_name'] = $new_pic_name;

        $path = $request->file('profile_pic')->storeAs('images/podcasts', $new_pic_name, 's3');
        $attributes['dp_url'] = Storage::disk('s3')->url($path);
        Storage::disk('s3')->setVisibility($path, 'public');

        Podcast::create($attributes);
        // dd($attributes);

        return redirect('/podcasts');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function show(Podcast $podcast)
    {
      $authors = explode(',', $podcast->authors);
      $trimmed_authors = array();
      foreach ($authors as $author) {
          $trimmed_authors[] = trim($author);
      }
      $verified = Author::whereIn('name', $trimmed_authors)->select('name', 'slug')->get(); 
      
      $unverified = array();
      foreach ($trimmed_authors as $t) {
          $found = 0;
          foreach ($verified as $v) {
              if (strrpos($v->name, $t) > -1) {
                  $found = 1;
                  break;
              }
          }
          if ($found != 1) {
              $unverified[] = $t;
          }
      }
      
      return view('podcasts.podcast', compact('podcast', 'verified', 'unverified'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function edit(Podcast $podcast)
    {
        return view('podcasts.edit-group', compact('podcast'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Podcast $podcast)
    {

      $attributes = request()->validate([
        'name'=>'required|min:3|max:255',
        'authors'=>'required',
        'description'=>'required|min:3',
        'sport'=>'required|min:1|max:255',
        'profile_pic'=>'image|mimes:jpeg,png,jpg,gif',
        'apple'=>'max:255',
        'spotify'=>'max:255',
        'other_link'=>'max:255',
        'other_name'=>'max:255'
      ]);

      $attributes['slug'] = str_slug($attributes['name'], "-");

      if ($request->hasFile('profile_pic')) {

        //  Delete Old Pic off AWS
        $path = 'images/podcasts/' . $podcast->dp_name;
        Storage::disk('s3')->delete($path);

        // Rename New Pic
        $new_pic_name = rand() . '.' . $request->file('profile_pic')->getClientOriginalName();
        unset($attributes['profile_pic']);
        $attributes['dp_name'] = $new_pic_name;

        // Store New Pic
        $path = $request->file('profile_pic')->storeAs('images/podcasts', $new_pic_name, 's3');
        $attributes['dp_url'] = Storage::disk('s3')->url($path);
        Storage::disk('s3')->setVisibility($path, 'public');

      }

      $podcast->update($attributes);

      return redirect('/podcasts');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Podcast $podcast)
    {
      // Remove Pod shows associated with Podcast
      $pods = Pod::where('group_name', 'like',"{$podcast->name}")->get();
      foreach ($pods as $pod) {
        $pod->delete();
      }

      //  Delete Old Pic off AWS
      $path = 'images/podcasts/' . $podcast->dp_name;
      Storage::disk('s3')->delete($path);

      $podcast->delete();
      return redirect('/podcasts');
    }
}
