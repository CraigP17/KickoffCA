@extends('layout')


@section('title') Kickoff - Home @endsection


@section('content')

  <!--BODY-->
    <div class="container-fluid" style="background-color:#E1E1E1">

      <!--TOP STORY, HEADLINES, PODCASTS-->
      <div class="row">

        <!--TOP STORY-->
        <div class="col-lg-6" style="background-color:white;padding:0;height:auto;border:0.5px solid grey">
          <div class="thumbnail" style=";padding:25px;">
            <img src="/storage/Images/Articles/{{$main_art->header_img}}" alt="Top Headline Image" style="width:100%;margin-bottom:20px;border-radius:1%">
            <h1 style="letter-spacing: -0.03em;"> <a style="color:black;" href="/articles/{{$main_art->slug}}"> {{$main_art->title}} </a> </h1>
            <p style="margin:0">{{$main_art->author}} <span style="float:right">{{date('F j, Y g:i A', strtotime($main_art->date))}}</span> </p>
            <h4> <small>{{$main_art->description}}</small> </h4>
          </div>
        </div>

        <!-- Today, Headline, Podcast -->

        <!--HEADLINES-->
        <div class="col-lg-3" style="background-color:#E3E3E3;border:0.5px solid grey;height:auto;overflow-y: scroll;padding-top:15px;letter-spacing: -0.03em;" id="backgroundImg">
          <h3 class="text-center" style="background-color:#FFFFFF;">RECENT  HEADLINES</h3>
          <ul class="list-group list-group-flush dropdown">
            @foreach ($articles as $top_art)
              <a href="/articles/{{$top_art->slug}}" class="list-group-item list-group-item-action">
                <p style="color:#A80C00;margin:0">{{$top_art->sport}} <span style="float:right;">{{date('F j, Y', strtotime($top_art->date))}} </span> </p>
                <h4 style="text-align:center;color:#444444"> {{$top_art->title}}</h4>
               </a>
            @endforeach
          </ul>
          <br>
        </div>

        <div class="col-lg-3" style="margin:0;padding:0;">

          <!--PODCASTS-->
            <div class="col" style="background-color:#AFAFAF; border:0.5px solid grey;padding-top:15px;">
              <h3 class="text-center">LATEST PODCASTS</h3>
              <ul class="list-group list-group-flush">
                @foreach ($podcasts as $pod)
                  <a href="/podcasts/{{$pod->slug}}" class="list-group-item list-group-item-action">
                     <small>{{$pod->sport}} <span style="float:right;color:#A80C00">{{date('F j, Y', strtotime($pod->date))}} </span> </small>
                      <h5>{{$pod->name}}</h5> <h6>{{$pod->group_name}}</h6> </a>
                @endforeach
              </ul>
              <br>
            </div>

          <!--TODAY-->
          @if (!$statotd->isEmpty())
            <div class="col" id="border-today">
              <h3 class="text-center" id="darker-today"> THIS DAY IN HISTORY</h3>
              <h4 id="kickred"> {{date('F j, Y', strtotime($statotd[0]->date))}} </h4>
              <p id="darker-today">
                {{$statotd[0]->statistic}}
              </p>
              <p id="source-today">
                 <a href="{{$statotd[0]->source}}" target="_blank" id="kickred">({{$statotd[0]->source_title}})</a>
              </p>
            </div>
          @endif

        </div>

      </div>

      <!--Top Headlines-->
      <div class="row" style="padding-bottom:35px;padding-top:15px;margin-bottom:0;background-color:#BF4054" id="backgroundImg">
        <div class="col-12">
          <h1 style="color:#A80C00;margin-left:5vw">Top Headlines</h1>
        </div>
        <div class="col-12">
          <div class="row">
            @foreach ($top_headline as $top_art)
              <div class="col-md-4">
                <div class="card" style="margin-bottom:35px;">
                  <div class="card-img">
                    <img src="/storage/Images/Articles/{{$top_art->header_img}}" alt="{{$top_art->header_img}}">
                  </div>
                  <div class="card-title" style="margin:10px;margin-bottom:0">
                    <a href="/articles/{{$top_art->slug}}"> <h4 style="text-align:center;padding-bottom:0;color:#222222;">{{$top_art->title}}</h4> </a>
                  </div>
                  <div class="card-body" style="padding-top:0">
                    <p style="margin:0;color:grey">{{$top_art->author}} <span style="float:right">{{date('F j, Y g:i A', strtotime($top_art->date))}}</span> </p>
                    {{$top_art->description}}
                  </div>
                  <div class="card-footer">
                    <a href="/articles/{{$top_art->slug}}" class="card-link">Read more</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>

      </div>

      <!-- 4 Sports Minis -->
      <div class="row" style="padding-top:20px;background-color:#F1F1E1">

        <div class="col-lg-4">
          <h3 style="text-align:center;">Basketball</h3>
          @foreach ($basketballs as $basketball)
            <div class="containment">
              <a href="/articles/{{$basketball->slug}}" class="empty">
                <img src="/storage/Images/Articles/{{$basketball->header_img}}" class="contained" alt="">
                <div class="bottom-left"> <h4>{{$basketball->title}}</h4> </div>
                <div class="top-right"> <p style="margin:0;">{{date('F j, Y', strtotime($basketball->date))}}</p> </div>
              </a>
            </div>
          @endforeach
        </div>

        <div class="col-lg-4">
          <h3 style="text-align:center;">Hockey</h3>
          @foreach ($hockeys as $puck)
            <div class="containment">
              <a href="/articles/{{$puck->slug}}" class="empty">
                <img src="/storage/Images/Articles/{{$puck->header_img}}" class="contained" alt="">
                <div class="bottom-left"> <h4>{{$puck->title}}</h4> </div>
                <div class="top-right"> <p style="margin:0;">{{date('F j, Y', strtotime($puck->date))}}</p> </div>
              </a>
            </div>
          @endforeach
        </div>

        <div class="col-lg-4">
          <h3 style="text-align:center;">Baseball</h3>
          @foreach ($baseballs as $ball)
            <div class="containment">
              <a href="/articles/{{$ball->slug}}" class="empty">
                <img src="/storage/Images/Articles/{{$ball->header_img}}" class="contained" alt="">
                <div class="bottom-left"> <h4>{{$ball->title}}</h4> </div>
                <div class="top-right"> <p style="margin:0;">{{date('F j, Y', strtotime($ball->date))}}</p> </div>
              </a>
            </div>
          @endforeach
        </div>

      </div>

      <!--Back to Top Button-->
      <button onclick="topFunction()" id="btop" title="Go to top"> <i class="fas fa-arrow-circle-up" style="font-size:150%;"></i> </button>

    </div>

@endsection
