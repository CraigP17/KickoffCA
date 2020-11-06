@extends('layout')


@section('title') Kickoff - Home @endsection


@section('content')

    <!--BODY-->
    <div class="container-fluid" id="backgroundImg">

        {{-- Top Story / Top Headlines --}}
        <div class="row" id="padtopbot">

            {{-- The Lead Story --}}
            <div class="col-lg-7">
                <div id="lead">
                    <h2 id="lead-story">THE LEAD</h2>

                    <div class="thumbnail mb-2" id="padtopbot">
                        <div class="card" id="card-main-hover">
                            <img class="card-img-top" src="{{$main_art->header_url}}" alt="{{$main_art->header_source}}">
                            <div class="card-body pt-1">
                                <h2 class="card-title m-0" id="textBlack">{{$main_art->title}} </h2>
                                <hr class="mt-1 mb-2">
                                <div id="leftCentreRight">
                                    <h5>{{$main_art->author}}</h5>
                                    <h5>{{$main_art->league}}</h5>
                                    <h5>{{date('F j, Y', strtotime($main_art->date))}}</h5>
                                </div>
                                <hr class="m-0">
                                <h5 class="card-text"> <small>{{$main_art->description}}</small> </h5>
                                <a href="/articles/{{$main_art->slug}}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Top Headlines --}}
            <div class="col-lg-5 col-md-8 mx-auto">

            <div class="mt-4">
                <h2 class="topHeader p-1 px-3" id="homeSectionHeader">TOP HEADLINES</h2>
            </div>

            <div id="headlines">
                <div class="pt-4">
                    <ul class="list-group list-group-flush dropdown" id="lines">
                        @foreach ($top_headline as $top_art)
                            <a href="/articles/{{$top_art->slug}}"
                            class="list-group-item list-group-item-action p-0"
                            id="card-main-hover">
                                <article class="media">
                                    <figure class="media-left mb-0 mr-0 my-auto">
                                        <img src="{{$top_art->header_url}}" 
                                            alt="{{$top_art->header_source}}" 
                                            id="topHeaderPic">
                                    </figure>
                                    <div class="media-content">
                                        <div class="content">
                                            <p class="m-0 mr-2 mt-1" id="textRed">{{$top_art->league}}
                                                <span id="floatRight">
                                                  {{date('F j', strtotime($top_art->date))}}
                                                </span>
                                            </p>
                                            <h5 class="mr-2 mb-0 pb-2">
                                                {{$top_art->title}}
                                            </h5>
                                        </div>
                                    </div>
                                </article>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>


            <div id="statotd">
                @if (!$statotd->isEmpty())
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
                @endif
            </div>

            </div>
        </div>


        {{-- Latest Podcast Sections --}}
        <div class="row mb-5 py-2" id="backdgrey">

            <div class="col-md-3 col-sm-12 col-12 my-2" id="podcast-title-mid">
                <div class="h-100" id="stat-center">
                    <h2 class="p-2 pt-3 mb-1 pb-3 m-2" id="homeSectionHeader">LATEST PODCASTS</h2>
                </div>
            </div>

            @foreach ($podcasts as $pod)
                <div class="col-md-3 col-sm-4 col-12 my-1">
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

        </div>


        {{-- More Stories Section --}}
        <div class="row mb-3">

            <div class="col-12 pl-0 mb-4" id="padtopbot">
                <h2 class="topHeader p-2" id="homeSectionHeader">
                    &nbsp; MORE STORIES &nbsp;
                </h2>
            </div>

            @foreach ($articles_s0 as $article)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <div class="card" id="card-hover">
                        <img class="card-img-top"
                            id="card-image"
                            src="{{$article->header_url}}"
                            alt="{{$article->header_img}}">
                        <div class="card-title mb-0 p-0 pl-2 pr-2 text-center">
                            <h4 class="m-0" id="textBlack">{{$article->title}}</h4>
                        </div>
                        <div class="card-body mx-1 mt-0 mb-2 px-2 py-0">
                            <p class="mb-0" id="textRed">
                                {{$article->author}}
                                <span id="floatRight">
                                    {{date('F j, Y', strtotime($article->date))}}
                                </span>
                            </p>
                            <a href="/articles/{{$article->slug}}" class="stretched-link"></a>
                        </div>
                        <div class="card-footer" id="readMoreRed">
                            <h4 class="mb-0 text-center" id="readMore">READ MORE...</h4>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        
        
        {{-- Latest Pop Culture Sections --}}
        <div class="row mb-4 py-2" id="pop-bg-blue">
            
            @foreach ($pop_articles as $pop)
                <div class="col-lg-3 col-md-4 col-12 my-1 order-lg-1 order-2">
                    
                    <div class="card mb-0 pb-0 h-100" id="podcast-hover">
                      <div class="row h-100 no-gutters">
                        <div class="col-4 col-md-5">
                            <img src={{$pop->header_url}} 
                                class="card-img h-100 py-auto" 
                                alt="..." 
                                style="object-fit:cover;border-radius: 3%;max-height:175px;">
                        </div>
                        <div class="col-8 col-md-7">
                          <div class="px-2 pt-0">
                              <div class="content">
                                  <p class="m-0 mr-2 mt-1 d-block d-md-none" id="textRed">
                                      {{$pop->league}}
                                      <span id="floatRight">
                                        {{date('F j', strtotime($pop->date))}}
                                      </span>
                                  </p>
                                  <h6 class="mr-2 mb-1 mb-md-0 mt-md-1 pb-0">
                                      {{$pop->title}}
                                  </h6>
                                  <small class="d-none d-md-block mb-1 p-0" id="textRed">{{date('F j', strtotime($pop->date))}} </small>
                              </div>
                          </div>
                        </div>
                      </div>
                      <a href="/pop-culture/{{$pop->slug}}" class="stretched-link"></a>
                    </div>
                    
                </div>
            @endforeach
                
                
            <div class="col-lg-3 col-sm-12 col-12 order-1 order-lg-2" id="podcast-title-mid">
                <div class="h-100" id="stat-center">
                    <h2 class="p-2 pt-3 mb-1 pb-3 m-2" id="pop-homeSectionHeader">LATEST IN POP CULTURE</h2>
                </div>
            </div>

        </div>
        
        
        {{-- More Stories Section PART 2 --}}
        <div class="row mb-3">
            
            <div class="col-md-2 col-sm-1 col-12">
            </div>
            
            <div class="col-md-8 col-sm-10 col-12">
                <ul class="list-group list-group-flush dropdown">
                    @foreach ($articles_s1 as $article_1)
                        <a href="/articles/{{$article_1->slug}}"
                        class="list-group-item list-group-item-action p-0"
                        id="card-main-hover">
                            @if ($loop->index != 0 && $loop->index != 3)
                                <article class="media">
                                    <figure class="media-left mb-0 mr-0 my-auto">
                                        <img src="{{$article_1->header_url}}" 
                                            alt="{{$article_1->header_source}}" 
                                            id="topHeaderPic">
                                    </figure>
                                    <div class="media-content">
                                        <div class="content">
                                            <p class="m-0 mr-2 mt-1" id="textRed">{{$article_1->league}}
                                                <span id="floatRight">
                                                  {{date('F j', strtotime($article_1->date))}}
                                                </span>
                                            </p>
                                            <h4 class="mr-2 mb-0 pb-0">
                                                {{$article_1->title}}
                                            </h4>
                                            <p class="mr-2 mb-0 pb-2 d-none d-lg-block">
                                                <small>{{$article_1->description}}</small>
                                            </p>
                                        </div>
                                    </div>
                                </article>
                            @else
                                <article class="media mb-0">
                                    <div class="mt-md-2 mb-2">
                                        <div class="row no-gutters">
                                            <div class="col-md-5 mb-0 pb-0 d-flex align-items-center justify-content-center">
                                                <img src="{{$article_1->header_url}}" 
                                                    alt="{{$article_1->header_source}}" 
                                                    class="my-auto px-2 pt-2 pt-md-0"
                                                    id="larger-topHeaderPic"
                                                    style="object-fit:cover">
                                            </div>
                                            <div class="col-md-7">
                                                <div class="content ml-2 ml-md-0">
                                                    <p class="m-0 mr-2" id="textRed">{{$article_1->league}}
                                                        <span id="floatRight">
                                                          {{date('F j', strtotime($article_1->date))}}
                                                        </span>
                                                    </p>
                                                    <h4 class="mr-2 mb-0 pb-0 text-center text-sm-left">
                                                        {{$article_1->title}}
                                                    </h4>
                                                    <p class="mr-2 mb-0 pb-2 d-none d-lg-block">
                                                        <small>{{$article_1->description}}</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endif
                        </a>
                    @endforeach
                </ul>

            </div>
            
            <div class="col-md-2 col-sm-1 col-12">
            </div>

        </div>
        
        
        {{-- Latest Kickoff Clips Sections --}}
        <div class="row mb-4 py-2" id="backdgrey">

            <div class="col-md-3 col-sm-12 col-12" id="podcast-title-mid">
                <div class="h-100" id="stat-center">
                    <h2 class="p-2 pt-3 mb-1 pb-3 m-2" id="homeSectionHeader">KICKOFF CLIPS</h2>
                </div>
            </div>

            @foreach ($kclips as $clip)
                <div class="col-md-3 col-sm-4 col-12 my-1">
                    <div class="card" id="podcast-hover">
                        <h4 class="p-1 m-0 text-center text-md-left" id="textRed">
                            <b> <i> {{$clip->group_name}} </i> </b>
                        </h4>
                        <p class="p-1 m-0" id="backdarkergrey">{{$clip->name}}</p>
                        <p class="p-1 m-0" id="textRed">
                            <b>{{date('F j', strtotime($clip->date))}}
                                <span id="floatRight">{{$clip->duration}}</span>
                            </b>
                        </p>
                        <a href="{{$clip->link}}" target="_blank" class="stretched-link"></a>
                    </div>
                </div>
            @endforeach

        </div>
        
        
        {{-- More Stories Section PART 3 --}}
        <div class="row">

            <div class="col-md-2 col-sm-1 col-12">
            </div>
            
            <div class="col-md-8 col-sm-10 col-12">
                <div class="row">
                    @foreach ($articles_s2 as $article_2)
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                            <div class="card" id="card-hover">
                                <img class="card-img-top"
                                    id="card-image"
                                    src="{{$article_2->header_url}}"
                                    alt="{{$article_2->header_img}}">
                                <div class="card-title mb-0 p-0 pl-2 pr-2 text-center">
                                    <h4 class="m-0" id="textBlack">{{$article_2->title}}</h4>
                                </div>
                                <div class="card-body mx-1 mt-0 mb-2 px-2 py-0">
                                    <p class="mb-0" id="textRed">
                                        {{$article_2->author}}
                                        <span id="floatRight">
                                            {{date('F j, Y', strtotime($article_2->date))}}
                                        </span>
                                    </p>
                                    <a href="/articles/{{$article_2->slug}}" class="stretched-link"></a>
                                </div>
                                <div class="card-footer m-0" id="readMoreRed">
                                    <h4 class="mb-0 text-center" id="readMore">READ MORE...</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="col-md-2 col-sm-1 col-12">
            </div>

        </div>

    </div>

@endsection
