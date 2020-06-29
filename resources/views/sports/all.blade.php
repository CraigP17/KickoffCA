@extends('layout')

@section('title')
  Kickoff - All Sports
@endsection

@section('content')

  <div class="container" style="background-color:#f0f0f0;">
    <div class="row" style="margin:0;padding:20px">
        <h1 class="title is-2" style="width:100%;text-align:center">All Sports</h1>
        <div class="row">
          @foreach ($sports as $sport)
            <div class="col-md-3 col-6" style="padding:10px;">
              <a href="/sports/{{$sport->slug}}">
                <div class="card" id="cardi">
                  <img src="/storage/Images/Sports/{{$sport->img_logo}}" class="sport-logo" alt="{{$sport->name}}" style="text-align:center">
                  <h3 style="text-align:center">{{$sport->name}}</h3>
                </div>
              </a>
            </div>
          @endforeach
          @foreach ($sports as $sport)
            <div class="col-md-3 col-6" style="padding:10px;">
              <a href="/sports/{{$sport->slug}}">
                <div class="card" id="cardi">
                  <img src="/storage/Images/Sports/{{$sport->img_logo}}" class="sport-logo" alt="{{$sport->name}}" style="text-align:center">
                  <h3 style="text-align:center">{{$sport->name}}</h3>
                </div>
              </a>
            </div>
          @endforeach
        </div>
    </div>
  </div>

@endsection
