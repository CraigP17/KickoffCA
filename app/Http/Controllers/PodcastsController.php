<?php

namespace App\Http\Controllers;

use App\Pod;
use App\Podcast;
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

        $new_pic_name = rand() . '.' . $request->file('profile_pic')->getClientOriginalName();
        $attributes['profile_pic'] = $new_pic_name;
        Storage::putFileAs('public/Images/Podcasts', $request->file('profile_pic'), $new_pic_name);

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
      //if (!$slug) return abort(404);
      return view('podcasts.podcast', compact('podcast'));
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
        $new_pic_name = rand() . '.' . $request->file('profile_pic')->getClientOriginalName();
        $path = 'public/Images/Podcasts/' . $podcast->profile_pic;
        Storage::delete($path);
        $attributes['profile_pic'] = $new_pic_name;
        Storage::putFileAs('public/Images/Podcasts', $request->file('profile_pic'), $new_pic_name);
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
      $pods = Pod::where('group_name', 'like',"{$podcast->name}")->get();
      foreach ($pods as $pod) {
        $pod->delete();
      }
      $podcast->delete();
      return redirect('/podcasts');
    }
}
