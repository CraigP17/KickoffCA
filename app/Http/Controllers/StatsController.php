<?php

namespace App\Http\Controllers;

use App\Stat;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $stats = Stat::orderBy('date')->get();
      return view('statsotd.all-stats', compact('stats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statsotd.create-stat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
          'date'=>'required|date_format:Y-m-d',
          'statistic'=>'required|min:1|max:255',
          'source'=>'url|max:255',
          'source_title'=>'max:255'
        ]);
        $date = date('F j Y', strtotime($attributes['date']));

        $attributes['date_word'] = $date;
        $attributes['slug'] = str_slug($date, "-");

        Stat::create($attributes);
        return redirect('/statsotd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function show(Stat $stat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function edit(Stat $stat)
    {
        return view('statsotd.edit-stat', compact('stat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stat $stat)
    {
      $attributes = $request->validate([
        'date'=>'required|date_format:Y-m-d',
        'statistic'=>'required|min:1|max:255',
        'source'=>'url|max:255',
        'source_title'=>'max:255'
      ]);
      $date = date('F j Y', strtotime($attributes['date']));

      $attributes['date_word'] = $date;
      $attributes['slug'] = str_slug($date, "-");

      $stat->update($attributes);
      return redirect('/statsotd');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stat $stat)
    {
      $stat->delete();
      return redirect('/statsotd');
    }
}
