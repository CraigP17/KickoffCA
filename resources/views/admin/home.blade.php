@extends('layout')

@section('title')
  Administrator
@endsection

@section('content')
  <div class="container-fluid" id="backgrey">

    <div class="row">
      <div class="col-md-2" id='backblue'>

        <div class="row">
          <div class="col-md-12 col-6">
            <h4 id="ad-title">SHORTCUTS</h4>
            <ul class="list-group list-group-flush">
              <a href="/articles" class="white"><h5 id="shorts"> <i class="fas fa-newspaper"></i> Articles</h5></a>
              <a href="/podcasts" class="white"><h5 id="shorts"> <i class="fas fa-podcast"></i> Podcasts</h5></a>
              <a href="/authors" class="white"><h5 id="shorts"> <i class="fas fa-user-friends"></i> Authors</h5></a>
              <a href="/sports" class="white"><h5 id="shorts"> <i class="fas fa-hockey-puck"></i> Sports</h5></a>
              <a href="/statsotd" class="white"><h5 id="shorts"> <i class="fas fa-list-ol"></i> Daily Stats</h5></a>
              <a href="https://google.com/analytics" class="white"> <h5 id="shorts"><i class="fas fa-chart-bar"></i> Google Analytics</h5> </a>
            </ul>
          </div>

          <div class="col-md-12 col-6">
            <div id="centered">
              <div class="logoutBtn">
                <a class="btn btn-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
              <h5 id="ad-title">QUICK CREATE</h5>
              <a href="/articles/create" class="btn btn-primary" role="button" id="but-create"> <i class="fas fa-newspaper"></i> Article</a>
              <a href="/podcasts/create" class="btn btn-info" role="button" id="but-create"> <i class="fas fa-podcast"></i> Podcast</a>
              <a href="/authors/create" class="btn btn-primary" role="button" id="but-create"> <i class="fas fa-at"></i> Author</a>
              <a href="/sports/create" class="btn btn-info" role="button" id="but-create"> <i class="fas fa-hockey-puck"></i> Sports </a>
              <a href="/leagues/create" class="btn btn-primary" role="button" id="but-create"> <i class="fas fa-hockey-puck"></i> League </a>
              <a href="/statsotd/create" class="btn btn-info" role="button" id="but-create"> <i class="fas fa-list-ol"></i> Stats</a>
              <a href="/kickoffclips/create" class="btn btn-primary" role="button" id="but-create"> <i class="fas fa-compact-disc"></i> Clip</a>
            </div>
          </div>

        </div>

      </div>
      <div class="col-md-10">
        <div class="row">
          {{-- <h5 id="centered"><span id="kickred">Disclaimer:</span> Administrator Page. If you're not an admin, you shouldn't be here. Email us on how you did tho.</h5> --}}
        </div>
        <div class="row">
          <div class="col-md-3 col-6">
            <div class="piece" id="piblue">
              <h1>{{$totalviews}}</h1>
              <h4><i class="fas fa-eye"></i> Total Views</h4>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="piece" id="piaqua">
              <h1>{{$totalarticles}}</h1>
              <h4><i class="fas fa-newspaper"></i> Articles</h4>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="piece" id="piyellow">
              <h1>{{$totalauthors}}</h1>
              <h4><i class="fas fa-user-friends"></i> Authors</h4>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="piece" id="pired">
              <h1>{{$totalclips}}</h1>
              <h4><i class="fas fa-compact-disc"></i> Kickoff Clips </h4>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-1">
          </div>
          <div class="col-md-10">

            <h3 id="ad-title">Recently Added Article Views</h3>
            <table class="table table-striped" id="backwhite">
              <thead>
                <tr>
                  <th scope="col">Views</th>
                  <th scope="col">Title</th>
                  <th scope="col">Author</th>
                  <th scope="col">Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($newviews as $article)
                  <tr>
                    <th scope="row">{{$article->views}}</th>
                    <td>{{$article->title}}</td>
                    <td>{{$article->author}}</td>
                    <td>{{date('F j, Y', strtotime($article->date))}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            <h3 id="ad-title">Most Viewed Articles</h3>
            <table class="table table-striped" id="backwhite">
              <thead>
                <tr>
                  <th scope="col">Views</th>
                  <th scope="col">Title</th>
                  <th scope="col">Author</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($artviews as $article)
                  <tr>
                    <th scope="row">{{$article->views}}</th>
                    <td>{{$article->title}}</td>
                    <td>{{$article->author}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

          </div>
          <div class="col-md-1">
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
