@extends('layout')

@section('title') Kickoff - All Kickoff Clips @endsection

@section('content')

  <div class="container-fluid bg-info">

    <div class="container" id="bg-dark">
      <div class="row" id="padtopbot">
        <h1 class="allauths">All Kickoff Clips</h1>
      </div>

      <div class="d-flex justify-content-start">
        <a href="/kickoffclips/create" class="btn btn-lg btn-success mb-1"
          role="button">Add New Clip</a>
      </div>

      <div class="row">
        @foreach ($clips as $clip)
          <div class="col-md-6">

            <div class="list-group-item">
                <h3 style="text-align:center;color:#006AD7">{{$clip->group_name}} <i id="kickred">on</i> <b style="color:black">{{$clip->name}}</b> </h3>

                <div class="row">
                    <div class="col-6">
                      <h5><b>Date:</b> {{date('F j, Y', strtotime($clip->date))}}</p>
                    </div>

                    <div class="col-6">
                      <h5><b>Duration:</b> {{$clip->duration}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-10">
                      <h6><a href="{{$clip->link}}">Spotify Link:</a> {{$clip->link}}</h6>
                    </div>

                    <div class="col-2">
                      <a href="/kickoffclips/{{$clip->slug}}" class="btn btn-primary btn-sm"
                        role="button">Edit Clip</a>
                    </div>
                </div>

            </div>

          </div>
        @endforeach
      </div>
      <br><br><br>
    </div>

  </div>

@endsection
