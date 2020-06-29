@extends('layout')

@section('title')
  Kickoff - All Authors
@endsection

@section('content')

  <div class="container-full" id="backred">

    <div class="container" id="backwhey">
      <div class="row" id="padtopbot">
        <h1 class="allauths">All Authors</h1>

        @foreach ($authors as $author)
          <div class="col-md-6">
            <a href="/authors/{{$author->slug}}" class="list-group-item list-group-item-action" id="spacetop">
              <article class="media">
                <figure class="media-left">
                  <img src="/storage/Images/Authors/{{$author->profile_pic}}" id="authpic">
                </figure>
                <div class="media-content">
                  <div class="content">
                    <h3 style="margin-bottom:5px"><strong>{{$author->name}}</strong></h3>
                    <p>{{$author->description}}</p>
                  </div>
                </div>
              </article>
            </a>
          </div>
        @endforeach

        @foreach ($authors as $author)
          <div class="col-md-6">
            <a href="/authors/{{$author->slug}}" class="list-group-item list-group-item-action" style="margin-top:20px;">
              <article class="media">
                <figure class="media-left">
                  <img src="/storage/Images/Authors/{{$author->profile_pic}}" style="max-width:15vw;max-height:12vh">
                </figure>
                <div class="media-content">
                  <div class="content">
                    <h3 style="margin-bottom:5px"><strong>{{$author->name}}</strong></h3>
                    <p>{{$author->description}}</p>
                    </>
                  </div>
                </div>
              </article>
            </a>
          </div>
        @endforeach
      </div>
    </div>

  </div>

@endsection
