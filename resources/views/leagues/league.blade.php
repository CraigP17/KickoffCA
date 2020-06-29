@extends('layout')


@section('title') Kickoff - {{$league->name}} @endsection

@section('content')

  <div class="container-full" id="backgroundImg">

    <div class="container">

      <div class="row" id="shortenName">
        <div class="col-12 d-flex justify-content-center justify-content-lg-start">
          <h1 class="mb-2 p-2" id="homeSectionHeader" style="border-radius:5px;">
            <a href="/sports/{{$sport->name}}" id="league-heading"> {{strtoupper($sport->name)}}</a> / {{strtoupper($league->name)}}
          </h1>
        </div>
      </div>

      <div class="row">

        <div class="col-md-7">
          <div class="thumbnail" id="mainCard">
            <img src="/storage/Images/Articles/{{$league_articles[0]->header_img}}" alt="Top Headline Image" id="mainCardImg">
            <h1 style="letter-spacing: -0.03em;"> <a style="color:black;" href="/articles/{{$league_articles[0]->slug}}"> {{$league_articles[0]->title}} </a> </h1>
            <p style="margin-bottom:3px" id="textRed">{{$league_articles[0]->author}} <span style="float:right">{{date('F j, Y g:i A', strtotime($league_articles[0]->date))}}</span> </p>
            <h4> <small>{{$league_articles[0]->description}}</small> </h4>
          </div>
        </div>

        <div class="col-md-5">
          <div class="row">
            <div class="containment">
              <a href="/articles/{{$league_articles[1]->slug}}" class="empty">
                <img src="/storage/Images/Articles/{{$league_articles[1]->header_img}}" class="contained" alt="">
                <div class="bottom-left"> <h4>{{$league_articles[1]->title}}</h4> </div>
                <div class="top-right"> <p style="margin:0;">{{date('F j, Y', strtotime($league_articles[1]->date))}}</p> </div>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="containment">
              <a href="/articles/{{$league_articles[2]->slug}}" class="empty">
                <img src="/storage/Images/Articles/{{$league_articles[2]->header_img}}" class="contained" alt="">
                <div class="bottom-left"> <h4>{{$league_articles[2]->title}}</h4> </div>
                <div class="top-right"> <p style="margin:0;">{{date('F j, Y', strtotime($league_articles[2]->date))}}</p> </div>
              </a>
            </div>
          </div>
        </div>

      </div>

      <div class="row" id="padtopbot">
        @for ($i=3; $i < count($league_articles); $i++)
          <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-3">
            <div class="card" id="card-hover">

              <img class="card-img-top" id="card-image"
              src="/storage/Images/Articles/{{$league_articles[$i]->header_img}}"
              alt="{{$league_articles[$i]->header_img}}">

              <div class="card-body mb-0 p-0 pl-2 pr-2 text-center">
                <h4 class="m-0 pt-1" id="textBlack">{{$league_articles[$i]->title}}</h4>
              </div>
              <div class="card-body m-0 p-0 pl-2 pr-3">
                <p class="mb-2" id="textRed">
                  {{$league_articles[$i]->author}}
                  <span id="floatRight" >{{date('F j, Y', strtotime($league_articles[$i]->date))}}</span>
                </p>
                <a href="/articles/{{$league_articles[$i]->slug}}" class="stretched-link"></a>
              </div>
              <div class="card-footer" id="readMoreRed">
                <h5 class="mb-0 text-center" id="readMore">READ MORE...</h4>
              </div>
            </div>
          </div>
        @endfor
      </div>

    </div>

  </div>

@endsection
