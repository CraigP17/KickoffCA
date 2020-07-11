<?php

namespace App\Http\Controllers;

use App\Article;
use App\Author;
use App\Podcast;
use App\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('date', 'desc')->get();
        return view('articles.all-art', compact('articles'));
    }

    /**
     * Display Pop Culture Page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function popculture()
    {
        $pop_arts = Article::where('sport', 'Pop Culture')->orderBy('date', 'desc')->get();
        $weeklymusic = Article::where('sport', 'Pop Culture')->where('league', 'Music Review')->orderBy('date', 'DESC')->get();

        return view('articles.all-pop', compact('pop_arts', 'weeklymusic'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function popshow(Article $article)
    {
        $article->increment('views');
        $author = Author::where('name', $article->author)->first();
        $others = Article::where([
          ['author', '=', $article->author],
          ['title', '!=', $article->title],
        ])->orderBy('date', 'desc')->take(3)->get();
        return view('articles.showpop', compact('article', 'author', 'others'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
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
          'title'=>'required|unique:articles|min:1|max:255',
          'description'=>'required|min:1|max:255',
          'author'=>'required|min:1|max:255',
          'date'=>'required|date_format:Y-m-d H:i:s',
          'sport'=>'required|min:1|max:255',
          'league'=>'max:255',
          'main_article'=>'boolean',
          'top_headline'=>'boolean',
          'header_img'=>'required|image|mimes:jpeg,png,jpg,gif',
          'header_source'=>'max:255',
          'content_1'=>'required',
          'image_1'=>'image|mimes:jpeg,png,jpg,gif',
          'img1_caption'=>'max:255',
          'content_2'=>'',
          'image_2'=>'image|mimes:jpeg,png,jpg,gif',
          'img2_caption'=>'max:255',
          'content_3'=>'',
          'image_3'=>'image|mimes:jpeg,png,jpg,gif',
          'img3_caption'=>'max:255',
          'content_4'=>''
        ]);

        $attributes['slug'] = str_slug($attributes['title'], "-");

        $new_header = rand() . '.' . $request->file('header_img')->getClientOriginalName();
        $attributes['header_img'] = $new_header;
        Storage::putFileAs('public/Images/Articles', $request->file('header_img'), $new_header);

        if (isset($attributes['image_1'])) {
          $new_img1 = rand() . '.' . $request->file('image_1')->getClientOriginalName();
          $attributes['image_1'] = $new_img1;
          Storage::putFileAs('public/Images/Articles', $request->file('image_1'), $new_img1);
        }
        if (isset($attributes['image_2'])) {
          $new_img2 = rand() . '.' . $request->file('image_2')->getClientOriginalName();
          $attributes['image_2'] = $new_img2;
          Storage::putFileAs('public/Images/Articles', $request->file('image_2'), $new_img2);
        }
        if (isset($attributes['image_3'])) {
          $new_img3 = rand() . '.' . $request->file('image_3')->getClientOriginalName();
          $attributes['image_3'] = $new_img3;
          Storage::putFileAs('public/Images/Articles', $request->file('image_3'), $new_img3);
        }

        Article::create($attributes);

        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article->increment('views');
        $author = Author::where('name', $article->author)->first();
        $others = Article::where([
          ['author', '=', $article->author],
          ['title', '!=', $article->title],
        ])->orderBy('date', 'desc')->take(4)->get();
        $top_headlines = Article::where([
          ['title', '!=', $article->title],
          ['top_headline', true]
        ])->orderBy('date', 'desc')->take(5)->get();
        $sports = Article::where([
          ['title', '!=', $article->title],
          ['sport', '=', $article->sport]
        ])->orderBy('date', 'desc')->take(4)->get();
        return view('articles.article', compact('article', 'author', 'others', 'top_headlines', 'sports'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
      $attributes = $request->validate([
        'title'=>'required|min:1|max:255',
        'description'=>'required|min:1|max:255',
        'author'=>'required|min:1|max:255',
        'date'=>'required|date_format:Y-m-d H:i:s',
        'sport'=>'required|min:1|max:255',
        'league'=>'max:255',
        'main_article'=>'boolean',
        'top_headline'=>'boolean',
        'header_img'=>'image|mimes:jpeg,png,jpg,gif',
        'header_source'=>'max:255',
        'content_1'=>'required',
        'image_1'=>'image|mimes:jpeg,png,jpg,gif',
        'img1_caption'=>'max:255',
        'content_2'=>'',
        'image_2'=>'image|mimes:jpeg,png,jpg,gif',
        'img2_caption'=>'max:255',
        'content_3'=>'',
        'image_3'=>'image|mimes:jpeg,png,jpg,gif',
        'img3_caption'=>'max:255',
        'content_4'=>''
      ]);

      $attributes['slug'] = str_slug($attributes['title'], "-");

      if (empty($attributes['main_article'])) {
        $attributes['main_article'] = "0";
      }
      if (empty($attributes['top_headline'])) {
        $attributes['top_headline'] = "0";
      }

      if ($request->hasFile('header_img')) {
        $new_head = rand() . '.' . $request->file('header_img')->getClientOriginalName();
        $path = 'public/Images/Articles/' . $article->header_img;
        Storage::delete($path);
        $attributes['header_img'] = $new_head;
        Storage::putFileAs('public/Images/Articles', $request->file('header_img'), $new_head);
      }

      if ($request->hasFile('image_1')) {
        $new_img1 = rand() . '.' . $request->file('image_1')->getClientOriginalName();
        $path = 'public/Images/Articles/' . $article->image_1;
        Storage::delete($path);
        $attributes['image_1'] = $new_img1;
        Storage::putFileAs('public/Images/Articles', $request->file('image_1'), $new_img1);
      }

      if ($request->hasFile('image_2')) {
        $new_img2 = rand() . '.' . $request->file('image_2')->getClientOriginalName();
        $path = 'public/Images/Articles/' . $article->image_2;
        Storage::delete($path);
        $attributes['image_2'] = $new_img2;
        Storage::putFileAs('public/Images/Articles', $request->file('image_2'), $new_img2);
      }

      if ($request->hasFile('image_3')) {
        $new_img3 = rand() . '.' . $request->file('image_3')->getClientOriginalName();
        $path = 'public/Images/Articles/' . $article->image_3;
        Storage::delete($path);
        $attributes['image_3'] = $new_img3;
        Storage::putFileAs('public/Images/Articles', $request->file('image_3'), $new_img3);
      }

      $article->update($attributes);

      $artpath = '/articles/' . $article->slug;
      return redirect($artpath);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {

      $head_path = 'public/Images/Articles/' . $article->header_img;
      Storage::delete($head_path);

      if (isset($article->image_1)) {
        $img1_path = 'public/Images/Articles/' . $article->image_1;
        Storage::delete($img1_path);
      };

      if (isset($article->image_2)) {
        $img2_path = 'public/Images/Articles/' . $article->image_2;
        Storage::delete($img2_path);
      };

      if (isset($article->image_3)) {
        $img3_path = 'public/Images/Articles/' . $article->image_3;
        Storage::delete($img3_path);
      };

      $article->delete();
      return redirect('/articles');
    }

}
