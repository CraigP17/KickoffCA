@extends('layout')

@section('title') Kickoff - All Podcasts @endsection

@section('content')

  <div class="container-fluid" id="backgroundImg">
    {{-- <div class="row">
      <div class="mt-4">
        <h2 class="p-2" id="homeSectionHeader">&nbsp; ALL PODCASTS &nbsp;</h2>
      </div>
    </div> --}}

    <div class="row py-3 mb-3">
      <div class="w-100 d-flex mb-4">
        <h2 class="allauths">ALL PODCASTS</h1>
      </div>
    </div>

    <div class="row">

      @foreach ($podcasts as $group)
        <div class="col-md-6 mb-3">
          <a href="/podcasts/{{$group->slug}}" class="list-group-item list-group-item-action h-100" id="card-main-hover">
            <div class="d-flex flex-lg-row flex-md-column flex-sm-row flex-column">
              <div class="d-flex justify-content-center mb-2">
                <img class="pod-img-about" src="{{$group->dp_url}}" alt="{{$group->name}}">
              </div>
              <div class="w-100 mt-0 d-sm-inline">
                <h3 class="art-pod-title mb-0 text-center w-100" id="textRed">
                  {{$group->name}}
                </h3>
                <div class="pl-sm-3 pr-sm-3">
                  <p class="mb-0 text-justify">
                    {{$group->description}}
                  </p>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach

    </div>

  </div>

@endsection
