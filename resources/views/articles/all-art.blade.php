@extends('layout')

@section('title')
  Kickoff - All Articles
@endsection

@section('content')

  <div class="container-full">

    <section class="pop-articles" id="pop-articles">
      <div class="row">
        @foreach ($articles as $art)
            <div class="col-md-3">
              <div class="card">
                <div class="card-img">
                  <img src="/storage/Images/Articles/{{$art->header_img}}" alt="">
                </div>
                <div class="cardtitle">
                  <h3 style="color:black">{{$art->title}}</h3>
                </div>
                <div class="card-body" style="padding-top:0;padding-bottom:0">
                  <small style="color:black;">{{$art->author}} <span style="float:right">{{date('F j, Y', strtotime($art->date))}}</span> </small> <br>
                  <p style="margin-top:10px;">{{$art->description}}</p>
                </div>
                <div class="card-footer" style="padding:0">
                  <a href="/articles/{{$art->slug}}" class="pop">Read more</a>
                </div>
              </div>
            </div>
        @endforeach

      </div>
    </section>

  </div>

@endsection
