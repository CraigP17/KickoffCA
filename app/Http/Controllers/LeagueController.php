<?php

namespace App\Http\Controllers;

use App\Sport;
use App\Podcast;
use App\Article;
use App\League;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // N/A No All Leagues Page
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leagues.addLeague');
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
          'parentSport'=>'required|min:1|max:255',
          'img_logo'=>'image|mimes:jpeg,png,jpg,gif',
        ]);
        $attributes['slug'] = str_slug($attributes['name'],"-");
        $new_logo_name = rand() . '.' . $request->file('img_logo')->getClientOriginalName();
        $attributes['img_logo'] = $new_logo_name;
        Storage::putFileAs('public/Images/Leagues', $request->file('img_logo'), $new_logo_name);

        League::create($attributes);

        $sport_page = '/sports/' . str_slug($attributes['parentSport'], "-");
        return redirect($sport_page);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\League  $league
     * @return \Illuminate\Http\Response
     */
    public function show(Sport $sport, League $league)
    {
        $league_articles = Article::where('league', $league->name)->orderBy('date', 'desc')->get();
        return view('leagues.league', compact('sport','league','league_articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\League  $league
     * @return \Illuminate\Http\Response
     */
    public function edit(League $league)
    {
        $league['parent_slug'] = str_slug($league['parentSport'], "-");
        return view('leagues.editLeague', compact('league'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\League  $league
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sport $sport, League $league)
    {
        $attributes = request()->validate([
        'name'=>'required|min:1|max:255',
        'parentSport'=>'required|min:1|max:255',
        'img_logo'=>'image|mimes:jpeg,png,jpg,gif'
        ]);
        $attributes['slug'] = str_slug($request['name'], "-");

        if ($request->hasFile('img_logo')) {
          $new_logo_name = rand() . '.' . $request->file('img_logo')->getClientOriginalName();
          $path = 'public/Images/Leagues/' . $league->img_logo;
          Storage::delete($path);
          $attributes['img_logo'] = $new_logo_name;
          \Storage::putFileAs('public/Images/Leagues', $request->file('img_logo'), $new_logo_name);
        }

        $league->update($attributes);
        $sport_page = '/sports/' . $sport->slug .  '/' . $league->slug;
        return redirect($sport_page);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\League  $league
     * @return \Illuminate\Http\Response
     */
    public function destroy(League $league)
    {
        $sport_page = '/sports/' . str_slug($league->parentSport, "-");
        $logo_path = 'public/Images/Leagues/' . $league->img_logo;
        Storage::delete($logo_path);
        $league->delete();
        return redirect($sport_page);
    }
}
