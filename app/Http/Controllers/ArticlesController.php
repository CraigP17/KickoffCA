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
        $main_art = Article::where([['sport', '=', 'Pop Culture'], ['top_headline', '=', 0], ['main_article', '=', 1]])->get()->last();
        $top_headline = Article::where([['sport', '=', 'Pop Culture'], ['top_headline', '=', 1], ['main_article', '=', 0]])->orderBy('date', 'desc')->take(4)->get();
        $articles = Article::where([['sport', '=', 'Pop Culture'], ['top_headline', '=', 0], ['main_article', '=', 0]])->orderBy('date', 'desc')->take(20)->get();
        $weeklymusic = Article::where('sport', 'Pop Culture')->where('league', 'Music Review')->get()->last();

        return view('articles.all-pop', compact('main_art', 'top_headline', 'articles', 'weeklymusic'));
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
        ])->orderBy('date', 'desc')->take(4)->get();
        $top_headlines = Article::where([
          ['title', '!=', $article->title],
          ['top_headline', true]
        ])->orderBy('date', 'desc')->take(5)->get();
        $sports = Article::where([
          ['title', '!=', $article->title],
          ['sport', '=', $article->sport]
        ])->orderBy('date', 'desc')->take(4)->get();
        
        return view('articles.showpop', compact('article', 'author', 'others', 'top_headlines', 'sports'));
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
        $path = $request->file('header_img')->storeAs('images/articles', $new_header, 's3');
        $attributes['header_url'] = Storage::disk('s3')->url($path);
        Storage::disk('s3')->setVisibility($path, 'public');

        if (isset($attributes['image_1'])) {
          $new_img1 = rand() . '.' . $request->file('image_1')->getClientOriginalName();
          $attributes['image_1'] = $new_img1;
          $path = $request->file('image_1')->storeAs('images/articles', $new_img1, 's3');
          $attributes['image_1_url'] = Storage::disk('s3')->url($path);
          Storage::disk('s3')->setVisibility($path, 'public');
        }
        if (isset($attributes['image_2'])) {
          $new_img2 = rand() . '.' . $request->file('image_2')->getClientOriginalName();
          $attributes['image_2'] = $new_img2;
          $path = $request->file('image_2')->storeAs('images/articles', $new_img2, 's3');
          $attributes['image_2_url'] = Storage::disk('s3')->url($path);
          Storage::disk('s3')->setVisibility($path, 'public');
        }
        if (isset($attributes['image_3'])) {
          $new_img3 = rand() . '.' . $request->file('image_3')->getClientOriginalName();
          $attributes['image_3'] = $new_img3;
          $path = $request->file('image_3')->storeAs('images/articles', $new_img3, 's3');
          $attributes['image_3_url'] = Storage::disk('s3')->url($path);
          Storage::disk('s3')->setVisibility($path, 'public');
        }

        Article::create($attributes);

        return redirect('/articles/' . $attributes['slug']);
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
      
      $init_path = 'images/articles';
      if ($request->hasFile('header_img')) {
        $old_path = $init_path . '/' . $article->header_img;
        Storage::disk('s3')->delete($old_path);
        $new_pic_name = rand() . '.' . $request->file('header_img')->getClientOriginalName();
        $attributes['header_img'] = $new_pic_name;
        $path = $request->file('header_img')->storeAs($init_path, $new_pic_name, 's3');
        $attributes['header_url'] = Storage::disk('s3')->url($path);
        Storage::disk('s3')->setVisibility($path, 'public');
      }

      if ($request->hasFile('image_1')) {        
        $old_path = $init_path . '/' . $article->image_1;
        Storage::disk('s3')->delete($old_path);
        $new_pic_name = rand() . '.' . $request->file('image_1')->getClientOriginalName();
        $attributes['image_1'] = $new_pic_name;
        $path = $request->file('image_1')->storeAs($init_path, $new_pic_name, 's3');
        $attributes['image_1_url'] = Storage::disk('s3')->url($path);
        Storage::disk('s3')->setVisibility($path, 'public');
      }

      if ($request->hasFile('image_2')) {
          $old_path = $init_path . '/' . $article->image_2;
          Storage::disk('s3')->delete($old_path);
          $new_pic_name = rand() . '.' . $request->file('image_2')->getClientOriginalName();
          $attributes['image_2'] = $new_pic_name;
          $path = $request->file('image_2')->storeAs($init_path, $new_pic_name, 's3');
          $attributes['image_2_url'] = Storage::disk('s3')->url($path);
          Storage::disk('s3')->setVisibility($path, 'public');
      }

      if ($request->hasFile('image_3')) {
          $old_path = $init_path . '/' . $article->image_3;
          Storage::disk('s3')->delete($old_path);
          $new_pic_name = rand() . '.' . $request->file('image_3')->getClientOriginalName();
          $attributes['image_3'] = $new_pic_name;
          $path = $request->file('image_3')->storeAs($init_path, $new_pic_name, 's3');
          $attributes['image_3_url'] = Storage::disk('s3')->url($path);
          Storage::disk('s3')->setVisibility($path, 'public');
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
        $init_path = 'images/articles/';
        
        $head_path = $init_path . $article->header_img;
        Storage::disk('s3')->delete($head_path);

        if (isset($article->image_1)) {
            $img1_path = $init_path . $article->image_1;
            Storage::delete($img1_path);
        };

        if (isset($article->image_2)) {
            $img2_path = $init_path . $article->image_2;
            Storage::delete($img2_path);
        };

        if (isset($article->image_3)) {
            $img3_path = $init_path . $article->image_3;
            Storage::delete($img3_path);
        };

        $article->delete();
        return redirect('/articles');
    }

}
