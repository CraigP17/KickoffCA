@extends('layout')

@section('title') Kickoff - All Podcasts @endsection

@section('content')

  <div class="container-fluid">
    <div class="container-fluid">
      <div class="row">
        <h1 style="text-align: center;width:100%;background-color:#E5E5E5;margin:0;padding:20px;">All Podcasts</h1>

        <div class="pod-card">

          @foreach ($podcasts as $podcast)
            <div class="cast">
              <div class="row">
                <div class="col-3">
                  <div class="group-img">
                    <img src="/storage/Images/Podcasts/{{$podcast->profile_pic}}" alt="{{$podcast->name}}" >
                  </div>
                </div>
                <div class="col-9">
                  <h3>{{$podcast->title}}</h3>
                  <p>{{$podcast->description}}</p>
                  <p>{{$podcast->sport}}</p>
                </div>
              </div>
            </div>
          @endforeach

        </div>
      </div>

      <div class="row">

        @foreach ($podcasts as $podcast)
          <div class="col-md-6" id="spacetop">
              <a href="/podcasts/{{$podcast->slug}}" class="list-group-item list-group-item-action">
              <div class="row">
                <div class="col-md-4">
                  <img src="/storage/Images/Podcasts/{{$podcast->profile_pic}}" alt="{{$podcast->name}}" style="width:100%">
                </div>
                <div class="col-md-8" id="spacetop">
                  <h3 style="color:#BF5454">{{$podcast->name}}</h3>
                  <p>{{$podcast->description}}</p>
                </div>
              </div>
              </a>
          </div>
        @endforeach

      </div>

    </div>
  </div>

@endsection
