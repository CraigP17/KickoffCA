<?php

namespace App\Http\Controllers;

use App\Sport;
use App\Podcast;
use App\Article;
use App\League;
use App\Clip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      #Need to get 3 most recent articles for the sidebar, var named $recents
            #Access db and get all sports with logos and names
        $recents = [];
        $sports = Sport::orderBy('name')->get();
        #dd($sports);
        return view('sports.all-sports', compact('sports', 'recents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sports.add-sport');
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
      'name'=>'required|min:1|max:255',
      'img_logo'=>'required|image|mimes:jpeg,png,jpg,gif',
      'img_header'=>'required|image|mimes:jpeg,png,jpg,gif'
    ]);

      $attributes['slug'] = str_slug($attributes['name'], "-");
      //$attributes['owner_id'] = auth()->id();


      $new_logo_name = rand() . '.' . $request->file('img_logo')->getClientOriginalName();
      $new_header_name = rand() . '.' . $request->file('img_header')->getClientOriginalName();
      $attributes['img_logo'] = $new_logo_name;
      $attributes['img_header'] = $new_header_name;

      Storage::putFileAs('public/Images/Sports', $request->file('img_logo'), $new_logo_name);
      Storage::putFileAs('public/Images/Sports', $request->file('img_header'), $new_header_name);

      Sport::create($attributes);
      // dd($attributes);

      return redirect('/sports');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function show(Sport $sport)
    {
        $rpodcasts = Podcast::where('sport', $sport->name)->get();
        $rarticles = Article::where('sport', $sport->name)->orderBy('date', 'desc')->get();
        $leagues = League::where('parentSport', $sport->name)->orderBy('name')->get();

        // Return Kickoff Clips of that sport
        // Attach parent Kickoff Clip Podcast's profile picture
        $clips = Clip::where('sport', $sport->name)->orderBy('date', 'desc')->get()->take(5);
        for ($i=0;$i<count($clips);$i++) {
          $pic = Podcast::select('profile_pic')->where('name', $clips[$i]['group_name'])->pluck('profile_pic');
          $clips[$i]['group_photo']= $pic[0];
        }

        return view('sports.sporticus', compact('sport', 'rpodcasts',
         'rarticles', 'leagues', 'clips'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function edit(Sport $sport)
    {
        return view('sports.edit-sport', compact('sport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sport $sport)
    {
      $attributes = request()->validate([
      'name'=>'required|min:1|max:255',
      'img_logo'=>'image|mimes:jpeg,png,jpg,gif',
      'img_header'=>'image|mimes:jpeg,png,jpg,gif'
      ]);

      $attributes['slug'] = str_slug($request['name'], "-");
      //$attributes['owner_id'] = auth()->id();

      if ($request->hasFile('img_logo')) {
        $new_logo_name = rand() . '.' . $request->file('img_logo')->getClientOriginalName();
        $path = 'public/Images/Sports/' . $sport->img_logo;
        Storage::delete($path);
        $attributes['img_logo'] = $new_logo_name;
        \Storage::putFileAs('public/Images/Sports', $request->file('img_logo'), $new_logo_name);
      }
      if ($request->hasFile('img_header')) {
        $new_header_name = rand() . '.' . $request->file('img_header')->getClientOriginalName();
        $path = 'public/Images/Sports/' . $sport->img_header;
        Storage::delete($path);
        $attributes['img_header'] = $new_header_name;
        \Storage::putFileAs('public/Images/Sports', $request->file('img_header'), $new_header_name);
      }

      $sport->update($attributes);

      return redirect('/sports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sport $sport)
    {
        $logo_path = 'public/Images/Sports/' . $sport->img_logo;
        $head_path = 'public/Images/Sports/' . $sport->img_header;
        Storage::delete($logo_path);
        Storage::delete($head_path);
        $sport->delete();
        return redirect('/sports');
    }
}
