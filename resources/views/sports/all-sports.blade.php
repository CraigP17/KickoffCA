@extends('layout')

@section('title')
  Kickoff - All Sports
@endsection

@section('content')

  <div class="container-fluid" id="backgroundImg">
    <div class="container" id="backgrey">

      <div class="row py-3 mb-3">
        <div class="w-100 d-flex mb-4">
          <h2 class="allauths">ALL SPORTS</h1>
        </div>
      </div>

      <div class="row">
        @foreach ($sports as $sport)
          <div class="col-lg-3 col-md-4 col-6 p-2">
            <a href="/sports/{{$sport->slug}}">
              <div class="card" id="cardi">
                <img src="/storage/Images/Sports/{{$sport->img_logo}}" class="sport-logo" alt="{{$sport->name}}" style="text-align:center">
                <h3 class="text-center py-auto">{{$sport->name}}</h3>
              </div>
            </a>
          </div>
        @endforeach
        @foreach ($sports as $sport)
          <div class="col-lg-3 col-md-4 col-6 p-2">
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
