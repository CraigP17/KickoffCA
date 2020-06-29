<?php

namespace App\Http\Controllers;

use App\Clip;
use App\Podcast;
use Illuminate\Http\Request;

class ClipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $clips = Clip::orderBy('date', 'desc')->get();
      return view('clips.allClips', compact('clips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clips.addClip');
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
          'group_name'=>'required|min:1|max:255',
          'name'=>'required|min:3|max:255',
          'sport'=>'required|min:3|max:255',
          'date'=>'required|date_format:Y-m-d',
          'duration'=>'required',
          'link'=>'required|max:255'
        ]);

        $attributes['slug'] = str_slug($attributes['name'], "-");
        Clip::create($attributes);

        $sportUrl = '/sports/' . str_slug($attributes['sport'], "-");
        return redirect($sportUrl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clip  $clip
     * @return \Illuminate\Http\Response
     */
    public function edit(Clip $clip)
    {
        return view('clips.editClip', compact('clip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clip  $clip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clip $clip)
    {
      $attributes = request()->validate([
        'group_name'=>'required|min:1|max:255',
        'name'=>'required|min:3|max:255',
        'sport'=>'required|min:3|max:255',
        'date'=>'required|date_format:Y-m-d',
        'duration'=>'required',
        'link'=>'required|max:255'
      ]);
      $attributes['slug'] = str_slug($attributes['name'], "-");

      $clip->update($attributes);

      $sportUrl = '/sports/' . str_slug($attributes['sport'], "-");
      return redirect($sportUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clip  $clip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clip $clip)
    {
      $sportUrl = '/sports/' . str_slug($clip['sport'], "-");
      $clip->delete();
      return redirect($sportUrl);
    }
}
