@extends('pop-layout')

@section('title')
  Kickoff Pop - {{$article->title}}
@endsection


@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-1">
      </div>

      <div class="col-md-10" style="background-color: #E3E3E3;padding-left:5vw;padding-right:4vw;">

        <h1 class="art-title"> {{$article->title}} </h1>

        <img src="/storage/Images/Articles/{{$article->header_img}} " alt="Image" style="width:100%;">

        <h5 class="author">  <img src="/storage/Images/Authors/{{$author->profile_pic}}" alt="{{$author->name}}" class="art-author-img">
          <a href="/authors/{{$author->slug}}">{{$author->name}}</a>
          <span style="float:right;">{{date('F j, Y g:i A', strtotime($article->date))}}</span> </h5>
        <br>

        <p class="content" style="white-space: pre-line"> {!!$article->content_1!!} </p>
        @isset($article->image_1)
          <div class="in-article-image">
            <img src="/storage/Images/Articles/{{$article->image_1}}" alt="" class="art-img">
            <span style="margin:10px;">{{$article->img1_caption}}</span>
          </div>
        @endisset

        <p class="content" style="white-space: pre-line"> {!!$article->content_2!!} </p>
        @isset($article->image_2)
          <div class="in-article-image">
            <img src="/storage/Images/Articles/{{$article->image_2}}" alt="" class="art-img" style="white-space: pre-line">
            <span style="margin:10px;">{{$article->img2_caption}}</span>
          </div>
        @endisset

        <p class="content" style="white-space: pre-line"> {!!$article->content_3!!} </p>
        @isset($article->image_3)
          <div class="in-article-image">
            <img src="/storage/Images/Articles/{{$article->image_3}}" alt="" class="art-img" style="white-space: pre-line">
            <span style="margin:10px;">{{$article->img3_caption}}</span>
          </div>
        @endisset

        <p class="content" style="white-space: pre-line"> {!!$article->content_4!!} </p>

        <p class="content" style="text-align:right;"> <i>Header Image: {{$article->header_source}}</i> </p>

      </div>

      <div class="col-md-1">
      </div>

    </div>

    @if (!$others->isEmpty())
      <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10" style="padding-bottom:35px;margin-bottom:0;padding-top:5px;background-color:#BF4054">
          <div class="row">
            <h2 style="color:#F8F8F8;text-align:center;width:100%">Other Articles by This Author</h2>
              @foreach ($others as $other)
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-img">
                      <img class="otherArts" src="/storage/Images/Articles/{{$other->header_img}}" alt="">
                    </div>
                    <div class="cardtitle">
                      <a href="/pop-culture/{{$other->slug}}"><h3 style="margin:10px;color:black;font-size:1.25rem;">{{$other->title}}</h3></a>
                    </div>
                    <div class="card-footer" style="padding:0">
                      <p style="color:black;margin:12px;padding-left:10px;width:100%;">
                        {{$other->author}}
                        <span style="float:right">
                          {{date('F j, Y ', strtotime("$other->date"))}} &nbsp;
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
              @endforeach
          </div>
        </div>
        <div class="col-md-1">
        </div>
      </div>
    @endif

  </div>
@endsection
