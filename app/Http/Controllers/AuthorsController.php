<?php

namespace App\Http\Controllers;

use App\Author;
use App\Podcast;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $authors = Author::orderBy('name')->get();
      return view('authors.everyone', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create-author');
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
      'description'=>'required|min:1',
      'profile_pic'=>'required|image|mimes:jpeg,png,jpg,gif',
      'twitter'=>'max:255',
      'youtube'=>'max:255',
      'email'=>'max:255'
    ]);
      $attributes['slug'] = str_slug($attributes['name'], "-");

      $pic_name = rand() . '.' . $request->file('profile_pic')->getClientOriginalName();
      $attributes['profile_pic'] = $pic_name;
      Storage::putFileAs('public/Images/Authors', $request->file('profile_pic'), $pic_name);
      Author::create($attributes);

      $redir = '/authors/' . $attributes['slug'];

      return redirect($redir);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
      $podcast = Podcast::where('authors', 'like',"%{$author->name}%")->get();
      $article = Article::where('author', $author->name)->orderBy('date', 'desc')->get();
      //if (!$podcast) return abort(403);
      return view('authors.author', compact('author', 'podcast', 'article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('authors.edit-author', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
      $attributes = request()->validate([
      'name'=>'required|min:1|max:255',
      'description'=>'required|min:1',
      'profile_pic'=>'image|mimes:jpeg,png,jpg,gif',
      'twitter'=>'max:255',
      'youtube'=>'max:255',
      'email'=>'max:255'
    ]);

      $attributes['slug'] = str_slug($request['name'], "-");
      //$attributes['owner_id'] = auth()->id();

      if ($request->hasFile('profile_pic')) {
        $p_name = rand() . '.' . $request->file('profile_pic')->getClientOriginalName();
        $path = 'public/Images/Authors/' . $author->profile_pic;
        Storage::delete($path);
        $attributes['profile_pic'] = $p_name;
        Storage::putFileAs('public/Images/Authors', $request->file('profile_pic'), $p_name);
      }

      $author->update($attributes);

      $redir = '/authors/' . $attributes['slug'];
      return redirect($redir);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
      $logo_path = 'public/Images/Authors/' . $author->profile_pic;
      Storage::delete($logo_path);
      $author->delete();
      return redirect('/');
    }
}
