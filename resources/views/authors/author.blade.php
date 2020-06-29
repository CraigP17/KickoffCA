@extends('layout')

@section('title')
  Kickoff - {{$author->name}}
@endsection


@section('content')
  <div class="container-fluid" id="backgroundImg">


  <div class="container" id="backgrey">

    <!-- Profile -->
    <br>
    <div class="row" style="box-shadow: 0px 1px 3px grey;" id="backwhite">
      <div class="author-about">
        <div class="flex-author">
          <div>
            <img src="/storage/Images/Authors/{{$author->profile_pic}}" alt="" class="author-img-about">
          </div>

          <div style="padding-right:3vw">
            <h1> {{$author->name}} </h1>
            <p> {{$author->description}} </p>
            <h5>
              @isset($author->twitter)
                <a href="//www.twitter.com/{{$author->twitter}}" target="_blank">
                  <i class="fab fa-twitter"> </i> {{$author->twitter}}
                </a>
              @endisset
              &nbsp; &nbsp; &nbsp;
              @isset($author->youtube)
                <a href="//www.youtube.com/user/{{$author->youtube}}" target="_blank">
                  <i class="fab fa-youtube"> </i> {{$author->youtube}}
                </a>
              @endisset
              &nbsp; &nbsp; &nbsp;
              @isset($author->email)
                <a href="mailto:{{$author->email}}"> <i class="fas fa-envelope"></i> Email</a>
              @endisset
            </h5>
          </div>

        </div>
      </div>
    </div>
    <br>

    @if (!$podcast->isEmpty())
      <div class="row">
        <div class="col-lg-2 col-12 text-center p-0">
          <h5 class="p-2" id="auth-art">Podcasts</h4>
        </div>

        <div class="col-lg-10 col-12">
          <ul class="list-group list-group-flush">
            @foreach ($podcast as $group)

              <a href="/podcasts/{{$group->slug}}" class="list-group-item list-group-item-action">

                <img src="/storage/Images/Podcasts/{{$group->profile_pic}}" class="Podcast-about" alt="{{$group->name}}">
                <h3 class="art-pod-title">
                   {{$group->name}}
                   <span style="float:right;font-size:75%;" id="textRed"> {{$group->sport}} </span>
                </h3>
                <p style="margin-left:10vw;">
                  {{$group->description}}
                </p>

              </a>

            @endforeach
          </ul>
        </div>

      </div>
    @endif

    <div class="row mt-4">
      <div class="col-lg-2 col-12 text-center p-0">
        <h5 class="p-3" id="auth-art"> All Articles </h4>
      </div>

      <div class="col-lg-10 col-12">
        <ul class="list-group list-group-flush dropdown" style="width:100%;">
          @foreach ($article as $art)
            <a href="/articles/{{$art->slug}}" class="list-group-item list-group-item-action">
              <p class="mb-0" id="textRed">{{$art->sport}} <span style="float:right;"> {{date('F j, Y g:i A', strtotime($art->date))}} </span> </p>
              <h4 style="color:black;"> {{$art->title}} </h4>
              <p> {{$art->description}} </p>
            </a>
          @endforeach
        </ul>
      </div>
    </div>
    <br><br>

    <br><br>



  </div>

  </div>

@endsection
