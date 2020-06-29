@extends('layout')

@section('title') Kickoff - All Podcasts @endsection

@section('content')

  <div class="container-fluid" style="background-color: #AF2721">
    <div class="row" id="padtopbot">
      <h1 class="allauths">All Podcasts</h1>
    </div>

    <div class="row">
      @foreach ($podcasts as $podcast)
        <div class="col-md-6" id="spacetop">
            <a href="/podcasts/{{$podcast->slug}}" class="list-group-item list-group-item-action" style="background-color:#f9faf5" >
            <div class="row">
              <div class="col-4">
                <img src="/storage/Images/Podcasts/{{$podcast->profile_pic}}" alt="{{$podcast->name}}" style="width:100%">
              </div>
              <div class="col-8" >
                <h3 style="color:#2d5d7c"> <b> {{$podcast->name}} </b></h3>
                <p style="color:#2e364f" >{{$podcast->description}}</p>
              </div>
            </div>
            </a>
        </div>
      @endforeach
    </div>
    <br>
  </div>

@endsection
