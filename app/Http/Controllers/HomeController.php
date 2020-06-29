<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Author;
use App\Pod;
use App\Clip;
use App\Podcast;
use App\Stat;
use App\Sport;
use App\League;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin()
    {
        $totalviews = Article::sum('views');
        $totalauthors = Author::count();
        $totalarticles = Article::count();
        $totalclips = Clip::count();
        $artviews = Article::orderBy('views', 'desc')->take(10)->get();
        $newviews = Article::orderBy('date', 'desc')->orderBy('views', 'desc')->take(10)->get();
        return view('admin.home', compact('totalviews', 'totalauthors', 'totalarticles', 'totalclips', 'artviews', 'newviews'));
    }

}
