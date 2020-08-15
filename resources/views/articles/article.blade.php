@extends('layout')

@section('title')
  Kickoff - {{$article->title}}
@endsection

@section('content')

  <div class="container-fluid" id="backgroundImg">
    <div class="container" id="backgrey">

      <div class="row pt-2">

        {{-- Main Article --}}
        <div class="col-lg-8">

          <h2 class="text-center" id="p-lin-height">{{ $article->title }}</h1>

          <img src="{{$article->header_url}}"
               alt="{{$article->header_source}}"
               class="w-100 mb-2">

          <div class="d-flex">
            <img src="{{$author->dp_url}}" 
                 alt="{{$author->name}}" 
                 class="art-author-img">

            <div class="row w-100">
              <div class="col-sm-6">
                <a href="/authors/{{$author->slug}}">
                  <h4 class="mb-0 w-100" id="textBlack">
                    {{$author->name}}
                  </h4>
                </a>
              </div>
              <div class="col-sm-6">
                <p class="mb-0 text-sm-right" id="textRed">
                  {{date('F j, Y g:i A', strtotime($article->date))}}
                </p>
              </div>
            </div>
          </div>

          <hr>

          <p class="content" style="white-space: pre-line"> {!!$article->content_1!!} </p>
          @isset($article->image_1)
            <div class="text-center">
              <figure class="figure-article">
                <img src="{{$article->image_1_url}}"
                     alt="{{$article->img1_caption}}"
                     class="img-article rounded">
                <figcaption class="figcaption-article">
                  <p class="w-100 p-2 mb-0 text-left">{{$article->img1_caption}}</p>
                </figcaption>
              </figure>
            </div>
          @endisset

          <p class="content" style="white-space: pre-line"> {!!$article->content_2!!} </p>
          @isset($article->image_2)
            <div class="text-center">
              <figure class="figure-article pl-auto">
                <img src="{{$article->image_2_url}}"
                     alt="{{$article->img2_caption}}"
                     class="img-article">
                <figcaption class="figcaption-article">
                  <p class="w-100 p-2 mb-0 text-left">{{$article->img2_caption}}</p>
                </figcaption>
              </figure>
            </div>
          @endisset

          <p class="content" style="white-space: pre-line"> {!!$article->content_3!!} </p>
          @isset($article->image_3)
            <div class="text-center">
              <figure class="figure-article">
                <img src="{{$article->image_3_url}}"
                     alt="{{$article->img3_caption}}"
                     class="img-article">
                <figcaption class="figcaption-article">
                  <p class="w-100 p-2 mb-0 text-left">{{$article->img3_caption}}</p>
                </figcaption>
              </figure>
            </div>
          @endisset

          <p class="content" style="white-space: pre-line"> {!!$article->content_4!!} </p>

          <p class="content" style="text-align:right;"> <i>Header Image: {{$article->header_source}}</i> </p>

        </div>

        {{-- First Extra Links, Visible on LG+ --}}
        <div class="col-lg-4 d-none d-lg-block">

          <h4 class="mb-0" id="art-header">More Articles</h4>
          <ul class="list-group list-group-flush dropdown">
            @foreach ($top_headlines as $top_art)
              <a href="/articles/{{$top_art->slug}}" class="list-group-item list-group-item-action p-1" id="article-blend">
                <p class="m-0 mt-1" id="textRed">{{$top_art->league}}
                  <span id="floatRight">
                    {{date('F j, Y', strtotime($top_art->date))}}
                  </span>
                </p>
                <h6 id="textBlack"> {{$top_art->title}}</h6>
               </a>
            @endforeach
          </ul>

          <br>

          <h4 class="mb-0" id="art-header">Latest in {{$article->sport}}</h4>
          <ul class="list-group list-group-flush dropdown">
            @foreach ($sports as $sport_article)
              <a href="/articles/{{$sport_article->slug}}"
                class="list-group-item list-group-item-action p-2"
                id="article-blend">
                <article class="media">
                  <div class="media-content">
                    <div class="my-auto">
                      <h6 class="mb-0 my-auto" id="textBlack">
                        {{$sport_article->title}}
                      </h6>
                    </div>
                  </div>
                  <figure class="media-right my-auto mb-0">
                    <img src="{{$sport_article->header_url}}"
                         alt="{{$sport_article->header_source}}"
                         id="article-mini-img">
                  </figure>
                </article>
              </a>
            @endforeach
          </ul>

        </div>

        {{-- Additional Links --}}
        {{-- Other Articles By The Same Article --}}
        <div class="col-lg-8 mb-3">
          <h4 class="w-100 text-center" id="art-header">More from {{$article->author}}</h4>
          <div class="row">
            @foreach ($others as $other)
              <div class="col-md-6 col-12 mb-3">
                <div class="card" id="card-hover">
                  <img class="card-img-top" id="card-image" style="height: 100px"
                        src="{{$other->header_url}}"
                        alt="{{$other->header_source}}">
                  <div class="card-title mb-0 p-0 pl-2 pr-2 text-center">
                    <h4 class="m-0" id="textBlack">{{$other->title}}</h4>
                  </div>
                  <div class="card-body m-0 p-0 pl-2 pr-3 pb-0">
                    <p class="mb-0" id="textRed">
                      {{$other->author}}
                      <span id="floatRight" >{{date('F j, Y', strtotime($other->date))}}</span>
                    </p>
                    <a href="/articles/{{$other->slug}}" class="stretched-link"></a>
                  </div>
                  <div class="card-footer p-1" id="readMoreRed">
                    <h4 class="mb-0 text-center" id="readMore">READ MORE...</h4>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>

        {{-- Second Extra Links --}}
        <div class="col-lg-4 mb-2">

          <div class="row">

            <div class="col-lg-12 col-sm-6 col-12 mb-4">
              <h4 class="mb-0" id="art-header">More Articles</h4>
              <ul class="list-group list-group-flush dropdown">
                @foreach ($top_headlines as $top_art)
                  <a href="/articles/{{$top_art->slug}}" class="list-group-item list-group-item-action p-1" id="article-blend">
                    <p class="m-0 mt-1" id="textRed">{{$top_art->league}}
                      <span id="floatRight">
                        {{date('F j, Y', strtotime($top_art->date))}}
                      </span>
                    </p>
                    <h6 id="textBlack"> {{$top_art->title}}</h6>
                   </a>
                @endforeach
              </ul>
            </div>

            <br>

            <div class="col-lg-12 col-sm-6 col-12">
              <h4 class="mb-0" id="art-header">Latest in {{$article->sport}}</h4>
              <ul class="list-group list-group-flush dropdown">
                @foreach ($sports as $sport_article)
                  <a href="/articles/{{$sport_article->slug}}"
                    class="list-group-item list-group-item-action p-2"
                    id="article-blend">
                    <article class="media">
                      <div class="media-content">
                        <div class="my-auto">
                          <h6 class="mb-0 my-auto" id="textBlack">
                            {{$sport_article->title}}
                          </h6>
                        </div>
                      </div>
                      <figure class="media-right my-auto mb-0">
                        <img src="{{$sport_article->header_url}}"
                            alt="{{$sport_article->header_source}}"
                            id="article-mini-img">
                      </figure>
                    </article>
                  </a>
                @endforeach
              </ul>
            </div>

          </div>

        </div>

      </div>
    </div>
  </div>

@endsection
