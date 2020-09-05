@extends('pop-layout')

@section('title') Kickoff - Pop Culture @endsection

@section('content')

    <div class="container-fluid" id="pop-backgroundImg">
        {{-- Top Story / Top Headlines --}}
        <div class="row" id="padtopbot">

            {{-- The Lead Story --}}
            <div class="col-lg-7">
                <h2 id="pop-lead-story">THE LEAD</h2>

                <div class="thumbnail mb-2" id="padtopbot">
                    <div class="card" id="card-main-hover">
                        <img class="card-img-top" src="{{$main_art->header_url}}" alt="{{$main_art->header_source}}">
                        <div class="card-body pt-1">
                            <h2 class="card-title m-0" id="textBlack">{{$main_art->title}} </h2>
                            <hr class="mt-1 mb-2">
                            <div id="pop-leftCentreRight">
                                <h5>{{$main_art->author}}</h5>
                                <h5>{{$main_art->league}}</h5>
                                <h5>{{date('F j, Y', strtotime($main_art->date))}}</h5>
                            </div>
                            <hr class="m-0">
                            <h5 class="card-text"> <small>{{$main_art->description}}</small> </h5>
                            <a href="/pop-culture/{{$main_art->slug}}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Top Headlines --}}
            <div class="col-lg-5 col-md-7 mx-auto">

                <div class="mt-4">
                    <h2 class="topHeader p-1 px-3" id="pop-homeSectionHeader">TOP HEADLINES</h2>
                </div>

                <div class="pt-4">
                    <ul class="list-group list-group-flush dropdown">
                        @foreach ($top_headline as $top_art)
                            <a href="/pop-culture/{{$top_art->slug}}"
                                class="list-group-item list-group-item-action p-0"
                                id="card-main-hover">
                                <article class="media">
                                    <figure class="media-left mb-0 mr-0 my-auto">
                                        <img src="{{$top_art->header_url}}" alt="{{$top_art->header_source}}" id="topHeaderPic">
                                    </figure>
                                    <div class="media-content">
                                        <div class="content">
                                            <p class="m-0 mr-2 mt-1" id="textRed">{{$top_art->league}}
                                                <span id="floatRight">
                                                    {{date('F j', strtotime($top_art->date))}}
                                                </span>
                                            </p>
                                            <h4 class="mr-2 mb-0 pb-2">
                                                {{$top_art->title}}
                                            </h4>
                                        </div>
                                    </div>
                                </article>
                            </a>
                        @endforeach
                    </ul>
                </div>
                
                @if ($weeklymusic)
                    <a href="/pop-culture/{{$weeklymusic->slug}}"
                        class="p-0">
                        <div class="row ml-0 mr-0 mt-3" id="border-today">
                            <div class="col-md-5 col-12 p-2">
                                <div class="h-100" id="stat-center">
                                    <h3 id="darker-today"> Latest Music Review </h3>
                                    <h4 class="pt-2" id="textRed"> {{$weeklymusic->title}} </h4>
                                </div>
                            </div>
                            <div class="col-md-7 col-12 p-3 pr-3">
                                <figure class="media mb-0 ml-0 my-auto">
                                    <img src="{{$weeklymusic->header_url}}" alt="{{$weeklymusic->header_source}}">
                                </figure>
                            </div>
                        </div>
                    </a>
                @endif

                {{-- @if (!$statotd->isEmpty())
                    <div>
                        <div class="row ml-0 mr-0 mt-3" id="border-today">
                            <div class="col-md-5 col-12 p-2">
                                <div class="h-100" id="stat-center">
                                    <h3 id="darker-today"> THIS DAY IN HISTORY </h3>
                                    <h4 class="pt-2" id="textRed"> {{date('F j', strtotime($statotd[0]->date))}} </h4>
                                </div>
                            </div>
                            <div class="col-md-7 col-12 p-2 pr-3">
                                <p id="darker-today">
                                    {{$statotd[0]->statistic}}
                                </p>
                                <p id="source-today">
                                    <a href="{{$statotd[0]->source}}" target="_blank" id="kickred">({{$statotd[0]->source_title}})</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endif --}}

            </div>
          
        </div>


        {{-- Latest Podcast Sections --}}
        {{-- <div class="row mb-5" id="backdgrey">

            <div class="col-md-3 col-sm-12 col-12" id="podcast-title-mid">
                <div class="h-100" id="stat-center">
                    <h2 class="p-2 pt-3 mb-1 pb-3 m-2" id="homeSectionHeader">LATEST PODCASTS</h2>
                </div>
            </div>

            @foreach ($podcasts as $pod)
                <div class="col-md-3 col-sm-4 col-12 mt-1 mb-1">
                    <div class="card" id="podcast-hover">
                        <h4 class="p-1 m-0 text-center text-md-left" id="textRed">
                            <b> <i> {{$pod->group_name}} </i> </b>
                        </h4>
                        <p class="p-1 m-0" id="backdarkergrey">{{$pod->name}}</p>
                        <p class="p-1 m-0" id="textRed">
                            <b>{{date('F j', strtotime($pod->date))}}
                                <span id="floatRight">{{$pod->time}}</span>
                            </b>
                        </p>
                        <a href="/podcasts/{{$pod->slug}}" class="stretched-link"></a>
                    </div>
                </div>
            @endforeach

        </div> --}}


        {{-- More Stories Section --}}
        <div class="row">

            <div class="col-12 pl-0 mb-4" id="padtopbot">
                <h2 class="topHeader p-2" id="pop-homeSectionHeader">
                    &nbsp; MORE STORIES &nbsp;
                </h2>
            </div>

            @foreach ($articles as $article)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <div class="card" id="card-hover">
                        <img class="card-img-top"
                            id="card-image"
                            src="{{$article->header_url}}"
                            alt="{{$article->header_img}}">
                        <div class="card-title mb-0 p-0 pl-2 pr-2 text-center">
                            <h4 class="m-0" id="textBlack">{{$article->title}}</h4>
                        </div>
                        <div class="card-body m-0 p-0 pl-2 pr-3 pb-0">
                            <p class="mb-0" id="textRed">
                                {{$article->author}}
                                <span id="floatRight" >{{date('F j, Y', strtotime($article->date))}}</span>
                            </p>
                            <p class="mb-2" id="textBlack">
                                {{$article->description}}
                            </p>
                            <a href="/pop-culture/{{$article->slug}}" class="stretched-link"></a>
                        </div>
                        <div class="card-footer" id="readMorePink">
                            <h4 class="mb-0 text-center" id="readMore">READ MORE...</h4>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

  {{-- <div class="container-fluid">
    <div class="row">
      <div class="col-lg-9">
        <section class="pop-articles" id="pop-articles">
          <ul>
            @foreach ($pop_arts as $pop)
              <li>
                <div class="card">
                  <div class="card-img">
                    <img src="{{$pop->header_url}}" alt="">
                  </div>
                  <div class="cardtitle">
                    <a href="/pop-culture/{{$pop->slug}}"><h3 style="margin:10px;color:black;font-size:1.25rem;">{{$pop->title}}</h3></a>
                  </div>
                  <div class="card-footer" style="padding:0">
                    <p style="color:black;margin:12px;padding-left:10px;width:100%;">
                      {{$pop->author}}
                      <span style="float:right">
                        {{date('F j, Y ', strtotime("$pop->date"))}} &nbsp;
                      </span>
                    </p>
                  </div>
                </div>
              </li>
            @endforeach
          </ul>
        </section>
      </div>

      <div class="col-lg-3" style="background-color:#E9FFFF">
        <div class="row" style="padding-top:15px">
          <h3 style="text-align:center;width:100%;text-shadow: 1px 1px 1px #EB49C7;">Music Reviews</h3>
          @foreach ($weeklymusic as $music)
            <div class="containment" >
              <a href="/pop-culture/{{$music->slug}}" class="empty">
                <img src="{{$music->header_url}}" class="contained" alt="">
                <div class="bottom-left"> <h4>{{$music->title}}</h4> </div>
                <div class="top-right"> <p style="margin:0;">{{date('F j, Y', strtotime($music->date))}}</p> </div>
              </a>
            </div>
          @endforeach
        </div>
        <div class="row" style="padding-top:20px">

        </div>

      </div>

    </div>


  </div> --}}

@endsection
