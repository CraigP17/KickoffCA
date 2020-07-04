@extends('layout')

@section('title') Kickoff - All Podcasts @endsection

@section('content')

  <div class="container-fluid" id="backgroundImg">
    <div class="row">
      <div class="mt-4">
        <h2 class="p-2" id="homeSectionHeader">&nbsp; ALL PODCASTS &nbsp;</h2>
      </div>
    </div>

    <div class="row">
      @foreach ($podcasts as $podcast)
        <div class="col-md-6" id="spacetop">
            <a href="/podcasts/{{$podcast->slug}}" class="h-100 list-group-item list-group-item-action" id="card-main-hover" style="background-color:#f9faf5" >
            <div class="row">
              <div class="col-4">
                <img class="w-100" src="/storage/Images/Podcasts/{{$podcast->profile_pic}}" alt="{{$podcast->name}}">
              </div>
              <div class="col-8" >
                <h3 id="textRed"> <b> {{$podcast->name}} </b></h3>
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
