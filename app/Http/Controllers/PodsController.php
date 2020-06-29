<?php

namespace App\Http\Controllers;

use App\Pod;
use App\Podcast;
use Illuminate\Http\Request;

class PodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('podcasts.create-pod');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Podcast $podcast)
    {
      $attributes = request()->validate([
      'name'=>'required|min:3|max:255',
      'description'=>'required|min:3',
      'date'=>'required|date_format:Y-m-d']);
      // $attributes['group_name'] = $podcast['slug'];
      // Pod::create($attributes);
      $podcast->addPod($attributes);
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pod  $pod
     * @return \Illuminate\Http\Response
     */
    public function show(Pod $pod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pod  $pod
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pod = Pod::findOrFail($id);
        //dd($pod);
        return view('podcasts.edit-pod', compact('pod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pod  $pod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $pod = Pod::findOrFail($id);
      $pod->update(request(['name','description','date']));

      return redirect('/podcasts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pod  $pod
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pod = Pod::findOrFail($id);
        $pod->delete();
        return redirect('/podcasts');
    }
}
