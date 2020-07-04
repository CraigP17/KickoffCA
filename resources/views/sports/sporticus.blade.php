@extends('layout')


@section('title') Kickoff - {{$sport->name}} @endsection

@section('content')
  <div class="container-fluid" id="backgroundImg">

    <div class="container">
      <div class="row" id="shortenName">

        {{-- Sport Title --}}
        <div class="col-md-3 d-flex justify-content-center justify-content-lg-start pl-0">
          <h1 class="mb-2 p-2" id="homeSectionHeader" style="border-radius:5px;">
            {{strtoupper($sport->name)}}
          </h1>
        </div>

        {{-- Filters --}}
        <div class="col-md-9" id="noSidePad">
          <div class="d-flex flex-wrap justify-content-end">
            <div class="align-self-center" style="display:inline-block">
              <h4 class="mb-0" id="textRed"> <b>Filter:</b> </h4>
            </div>
            @foreach ($leagues as $league)
              <a href="/sports/{{$sport->slug}}/{{$league->slug}}" class="empty mb-0">
                <img src="/storage/Images/Leagues/{{$league->img_logo}}" class="leagueLogo" alt="">
              </a>
            @endforeach
          </div>
        </div>
      </div>

      <div class="row mb-2">

        {{-- Headline Article --}}
        <div class="col-md-7">
          <div class="thumbnail mb-3">
            <div class="card" id="card-main-hover">
              <img class="card-img-top" src="/storage/Images/Articles/{{$rarticles[0]->header_img}}" alt="Top Headline Image">
              <div class="card-body pt-1">
                <h3 class="card-title m-0 text-center" id="textBlack">{{$rarticles[0]->title}} </h2>
                <hr class="mt-1 mb-2">
                <div id="leftCentreRight">
                  <h6>{{$rarticles[0]->author}}</h4>
                  <h6>{{$rarticles[0]->league}}</h4>
                  <h6>{{date('F j, Y', strtotime($rarticles[0]->date))}}</h4>
                </div>
                <hr class="m-0">
                <h5 class="card-text mb-0"> <small>{{$rarticles[0]->description}}</small> </h5>
                <a href="/articles/{{$rarticles[0]->slug}}" class="stretched-link"></a>
              </div>
            </div>
          </div>
        </div>

        {{-- 2 Side Articles --}}
        <div class="col-md-5">
          <div class="row">
            <div class="containment">
              <a href="/articles/{{$rarticles[1]->slug}}" class="empty">
                <img src="/storage/Images/Articles/{{$rarticles[1]->header_img}}" class="contained" alt="">
                <div class="bottom-left"> <h4>{{$rarticles[1]->title}}</h4> </div>
                <div class="top-right"> <p style="margin:0;">{{date('F j, Y', strtotime($rarticles[1]->date))}}</p> </div>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="containment">
              <a href="/articles/{{$rarticles[2]->slug}}" class="empty">
                <img src="/storage/Images/Articles/{{$rarticles[2]->header_img}}" class="contained" alt="">
                <div class="bottom-left"> <h4>{{$rarticles[2]->title}}</h4> </div>
                <div class="top-right"> <p style="margin:0;">{{date('F j, Y', strtotime($rarticles[2]->date))}}</p> </div>
              </a>
            </div>
          </div>
        </div>

      </div>

      <div class="row">

        {{--  More Articles --}}
        <div class="col-lg-8 col-md-6 pt-2">
          <div class="row">
            @for ($i=3; $i < count($rarticles); $i++)
              <div class="col-sm-6 col-12 mb-3">
                <div class="card" id="card-hover">
                  <img class="card-img-top" id="card-image"
                  src="/storage/Images/Articles/{{$rarticles[$i]->header_img}}"
                  alt="{{$rarticles[$i]->header_img}}">
                  <div class="card-body mb-0 p-0 pl-2 pr-2 text-center">
                    <h4 class="m-0" id="textBlack">{{$rarticles[$i]->title}}</h4>
                  </div>
                  <div class="card-body m-0 p-0 pl-2 pr-3">
                    <p class="mb-2" id="textRed">
                      {{$rarticles[$i]->author}}
                      <span id="floatRight" >{{date('F j, Y', strtotime($rarticles[$i]->date))}}</span>
                    </p>
                    <a href="/articles/{{$rarticles[$i]->slug}}" class="stretched-link"></a>
                  </div>
                  <div class="card-footer" id="readMoreRed">
                    <h5 class="mb-0 text-center" id="readMore">READ MORE...</h4>
                  </div>
                </div>
              </div>
            @endfor
          </div>
        </div>

        {{-- Kickoff Clips Section --}}
        <div class="col-lg-4 col-md-6 pt-2 mb-3">
          <div id="kickoffclipsSection">
              <h2 id="podcastTitle">
                <img src="/storage/Images/KClips.png" alt="" id="kClipsLogo">
                KICKOFF CLIPS
              </h2>

            <div>
              <ul class="list-group">
                @foreach ($clips as $clip)
                  <a href="{{$clip->link}}" target="_blank"
                    class="list-group-item list-group-item-action">
                    <article class="media">
                      <figure class="media-left mb-0 pr-1">
                        <img src="/storage/Images/Podcasts/{{$clip->group_photo}}" id="podPic">
                      </figure>
                      <div class="media-content">
                        <div class="content">
                          <h4 class="mb-1">
                            {{$clip->group_name}} On {{$clip->name}}
                          </h4>
                          <p id="podTime">{{date('F j', strtotime($clip->date))}} <span style="float:right">{{$clip->duration}} &nbsp;</span> </p>
                        </div>
                      </div>
                    </article>
                  </a>
                @endforeach
              </ul>
              <div class="d-flex justify-content-end" id="fullWidth">
                <a href="http://www.spotify.com" id="spotifyClips">
                  <h4 class="m-0">View All</h4>
                </a>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>

  </div>
@endsection
