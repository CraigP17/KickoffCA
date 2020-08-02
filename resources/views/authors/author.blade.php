@extends('layout')

@section('title')
  Kickoff - {{$author->name}}
@endsection


@section('content')
  <div class="container-fluid" id="backgroundImg">


  <div class="container" id="backgrey">

    <!-- Profile -->
    <br>
    <div class="row p-2 pt-4" style="box-shadow: 0px 1px 3px grey;" id="backwhite">

      <div class="col-12 col-md-3 mb-2" style="text-align: center">
        <img src="{{$author->dp_url}}" alt="" class="profile-pic">
      </div>
      <div class="col-12 col-md-9">
        <h1 class="text-md-left text-center"> {{$author->name}} </h1>
        <p> {{$author->description}} </p>
        <h5 class="text-md-left text-center pb-1">
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

    <br>


    <!-- Podcasts -->
    @if (!$podcast->isEmpty())
      <div class="row">
        <div class="col-lg-2 col-12 text-center p-0">
          <h5 class="p-2" id="auth-art">Podcasts</h4>
        </div>

        <div class="col-lg-10 col-12">
          <ul class="list-group list-group-flush">
            @foreach ($podcast as $group)

              <a href="/podcasts/{{$group->slug}}" class="list-group-item list-group-item-action">
                <div class="d-flex flex-md-row flex-column">
                  <div class="d-flex justify-content-center mb-2">
                    <img class="author-img-about" src="{{$group->dp_url}}" alt="{{$group->name}}">
                  </div>
                  <div class="w-100 mt-0 d-sm-inline">
                    <h3 class="art-pod-title mb-0 text-center w-100">
                      {{$group->name}}
                      <div class="d-block d-md-none"></div>
                      <span class="float-md-right" id="textRed" style="font-size:75%;"> {{$group->sport}} </span>
                    </h3>
                    <div class="pl-sm-3 pr-sm-3">
                      <p class="mb-0 text-justify">
                        {{$group->description}}
                      </p>
                    </div>
                  </div>
                </div>
              </a>

            @endforeach
          </ul>
        </div>

      </div>
    @endif


    <!-- Articles -->
    <div class="row mt-4">
      <div class="col-lg-2 col-12 text-center p-0">
        <h5 class="p-3" id="auth-art"> All Articles </h4>
      </div>

      <div class="col-lg-10 col-12">
        <ul class="list-group list-group-flush dropdown" style="width:100%;">
          @foreach ($article as $art)
            <a href="/articles/{{$art->slug}}" class="list-group-item list-group-item-action">
              <p class="mb-0" id="textRed">{{$art->sport}} <span style="float:right;"> {{date('F j, Y g:i A', strtotime($art->date))}} </span> </p>
              <h4 id="textBlack" class="mb-0 text-center text-md-left"> {{$art->title}} </h4>
              <p class="text-justify"> {{$art->description}} </p>
            </a>
          @endforeach
        </ul>
      </div>
    </div>

    <br>

  </div>

  </div>

@endsection
