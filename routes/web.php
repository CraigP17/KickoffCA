<?php
use App\Article;
use App\Pod;
use App\Podcast;
use App\Clip;
use App\Stat;
use App\Sport;
use App\League;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/about', function() {
    return view('about');
});

/*
   ----------------------- Routes for ADMIN Pages -----------------------
*/
Auth::routes();
Route::get('/admin-home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@admin')->middleware('auth')->middleware('is_admin')->name('admin');


/* ------------------ Routes for HOME PAGE ------------------ */
Route::get('/homekick', function() {
    $main_art = Article::where('main_article', true)->where('sport', '!=', 'Pop Culture')->get()->last();
    $top_headline = Article::where('top_headline', true)->where('sport', '!=', 'Pop Culture')->get();
    $articles = Article::where([
      ['sport', '!=', 'Pop Culture'],
      ['top_headline', '=', 0],
      ['main_article', '=', 0]
    ])->orderBy('date', 'desc')->take(4)->get();
    $podcasts = Pod::orderBy('date', 'desc')->take(3)->get();
    $basketballs = Article::where('sport', 'Basketball')->orderBy('date', 'desc')->take(3)->get();
    $hockeys = Article::where('sport', 'Hockey')->orderBy('date', 'desc')->take(3)->get();
    $baseballs = Article::where('sport', 'Baseball')->orderBy('date', 'desc')->take(3)->get();
    date_default_timezone_set('America/Toronto');
    $statotd = Stat::where('date', date('Y-m-d'))->get();
    return view('kickoffhome', compact('main_art', 'top_headline', 'articles', 'podcasts', 'hockeys',
     'basketballs', 'baseballs', 'statotd'));
});

/*
   --------------- Routes for Home Page ---------------
*/
Route::get('/', function() {
    date_default_timezone_set('America/Toronto');

    $main_art = Article::where('main_article', true)->where('sport', '!=', 'Pop Culture')->get()->last();

    $top_headline = Article::where('top_headline', true)->where('sport', '!=', 'Pop Culture')->orderBy('date', 'desc')->take(4)->get();

    $articles = Article::where([
        ['sport', '!=', 'Pop Culture'],
        ['top_headline', '=', 0],
        ['main_article', '=', 0]
    ])->orderBy('date', 'desc')->take(16)->get();
    
    // Split Articles into 3 Chunks of length 6, 5, 4
    $chunks = array();
    $split = array(6, 6, 4);
    $i = 0;
    while ($articles->count() && $i < 3) {
        $chunks[] = $articles->splice(0, $split[$i]);
        $i++;
    }
    // Assign each chunk to each articles_section
    $articles_s0 = (isset($chunks[0]) && $chunks[0]->count()) ? $chunks[0] : array();
    $articles_s1 = (isset($chunks[1]) && $chunks[1]->count()) ? $chunks[1] : array();
    $articles_s2 = (isset($chunks[2]) && $chunks[2]->count()) ? $chunks[2] : array();
    
    // TESTING only
    $articles_s1 = Article::where([
        ['sport', '!=', 'Pop Culture'],
        ['top_headline', '=', 0],
        ['main_article', '=', 0]
    ])->orderBy('date', 'desc')->take(6)->get();
    $articles_s2 = Article::where([
        ['sport', '!=', 'Pop Culture'],
        ['top_headline', '=', 0],
        ['main_article', '=', 0]
    ])->orderBy('date', 'desc')->take(4)->get();
    
    $pop_articles = Article::where('sport', '=', 'Pop Culture')->orderBy('date', 'DESC')->take(3)->get();

    $podcasts = Pod::orderBy('date', 'desc')->take(3)->get();
    $kclips = Clip::orderBy('date', 'desc')->take(3)->get();

    $statotd = Stat::where('date', date('Y-m-d'))->get();

    return view('homepage', compact('main_art', 'top_headline', 'articles_s0', 'articles_s1', 'articles_s2', 'podcasts', 'statotd', 'pop_articles', 'kclips'));
});

/*
   --------------- Routes for ARTICLES and POP CULTURE Articles ---------------
*/
Route::get('/articles', 'ArticlesController@index')->middleware('auth');
Route::get('/pop-culture', 'ArticlesController@popculture');
Route::get('/pop-culture/{article}', 'ArticlesController@popshow');
Route::get('/articles/create', 'ArticlesController@create')->middleware('auth')->middleware('is_admin');
Route::get('/articles/{article}/edit', 'ArticlesController@edit')->middleware('auth')->middleware('is_admin');
Route::post('/articles', 'ArticlesController@store')->middleware('auth');
Route::get('/articles/{article}', 'ArticlesController@show');
Route::patch('/articles/{article}', 'ArticlesController@update')->middleware('auth');
Route::delete('/articles/{article}', 'ArticlesController@destroy')->middleware('auth')->middleware('is_admin');


/*
   ------------------- Routes for SPORTS and LEAGUES Pages -------------------
*/
Route::get('/sports', 'SportsController@index');
Route::get('/sports/create', 'SportsController@create')->middleware('auth')->middleware('is_admin'); //auth only
Route::get('/leagues/create', 'LeagueController@create')->middleware('auth')->middleware('is_admin'); //auth only
Route::get('/sports/{sport}/edit', 'SportsController@edit')->middleware('auth')->middleware('is_admin');
Route::get('/leagues/{league}/edit', 'LeagueController@edit')->middleware('auth')->middleware('is_admin');
Route::post('/sports', 'SportsController@store')->middleware('auth');
Route::post('/sports/leagues', 'LeagueController@store')->middleware('auth');
Route::get('/sports/{sport}', 'SportsController@show');
Route::get('/sports/{sport}/{league}', 'LeagueController@show');
Route::patch('/sports/{sport}', 'SportsController@update')->middleware('auth');
Route::patch('/sports/{sport}/{league}', 'LeagueController@update')->middleware('auth');
Route::delete('/sports/{sport}', 'SportsController@destroy')->middleware('auth')->middleware('is_admin');
Route::delete('/leagues/{league}', 'LeagueController@destroy')->middleware('auth')->middleware('is_admin');


/*
   ----------------------- Routes for DAILY STATS Pages -----------------------
*/
Route::get('/statsotd', 'StatsController@index')->middleware('auth')->middleware('is_admin'); //all auth
Route::get('/statsotd/create', 'StatsController@create')->middleware('auth')->middleware('is_admin');
Route::get('/statsotd/{stat}/edit', 'StatsController@edit')->middleware('auth')->middleware('is_admin');
Route::post('/statsotd', 'StatsController@store')->middleware('auth');
Route::patch('/statsotd/{stat}', 'StatsController@update')->middleware('auth');
Route::delete('/statsotd/{stat}', 'StatsController@destroy')->middleware('auth')->middleware('is_admin');


/*
   ----------------------- Routes for AUTHOR Pages -----------------------
*/
Route::get('/authors/create', 'AuthorsController@create')->middleware('auth')->middleware('is_admin'); //auth only
Route::get('/authors/{author}/edit', 'AuthorsController@edit')->middleware('auth')->middleware('is_admin');
Route::get('/authors', 'AuthorsController@index');
Route::get('/authors/{author}', 'AuthorsController@show');
Route::post('/authors', 'AuthorsController@store')->middleware('auth');
Route::patch('/authors/{author}', 'AuthorsController@update')->middleware('auth');
Route::delete('/authors/{author}', 'AuthorsController@destroy')->middleware('auth')->middleware('is_admin');


/*
   --------------------- Routes for PODCASTS and EPISODES ---------------------
*/
Route::get('/podcasts/create', 'PodcastsController@create')->middleware('auth')->middleware('is_admin'); //auth only
Route::get('/podcasts/{podcast}/edit', 'PodcastsController@edit')->middleware('auth')->middleware('is_admin');
Route::get('/podcasts', 'PodcastsController@index');
Route::post('/podcasts', 'PodcastsController@store')->middleware('auth');
Route::post('/podcasts/{podcast}/pod', 'PodsController@store')->middleware('auth');
Route::get('/podcasts/{podcast}', 'PodcastsController@show');
Route::patch('/podcasts/{podcast}', 'PodcastsController@update')->middleware('auth');
Route::delete('/podcasts/{podcast}', 'PodcastsController@destroy')->middleware('auth')->middleware('is_admin');

Route::get('/episodes/{episode}/edit', 'PodsController@edit')->middleware('auth')->middleware('is_admin');
Route::patch('/episodes/{episode}', 'PodsController@update')->middleware('auth');
Route::delete('/episodes/{episode}', 'PodsController@destroy')->middleware('auth')->middleware('is_admin');


/*
   --------------------- Routes for PODCAST CLIPS ---------------------
*/
Route::get('/kickoffclips/create', "ClipController@create")->middleware('auth')->middleware('is_admin'); //auth only
Route::get('/kickoffclips/{clip}/edit', 'ClipController@edit')->middleware('auth')->middleware('is_admin');
Route::get('/kickoffclips', 'ClipController@index')->middleware('auth')->middleware('is_admin');
Route::post('/kickoffclips', 'ClipController@store')->middleware('auth')->middleware('is_admin');
Route::patch('/kickoffclips/{clip}', 'ClipController@update')->middleware('auth')->middleware('is_admin');
Route::delete('/kickoffclips/{clip}', 'ClipController@destroy')->middleware('auth')->middleware('is_admin');
