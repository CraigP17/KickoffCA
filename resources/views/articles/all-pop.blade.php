@extends('pop-layout')

@section('title') Kickoff - Pop Culture @endsection

@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-9">
        <section class="pop-articles" id="pop-articles">
          <ul>
            @foreach ($pop_arts as $pop)
              <li>
                <div class="card">
                  <div class="card-img">
                    <img src="{{$pop->header_url}}" alt="">
                  </div>
                  <div class="cardtitle">
                    <a href="/pop-culture/{{$pop->slug}}"><h3 style="margin:10px;color:black;font-size:1.25rem;">{{$pop->title}}</h3></a>
                  </div>
                  <div class="card-footer" style="padding:0">
                    <p style="color:black;margin:12px;padding-left:10px;width:100%;">
                      {{$pop->author}}
                      <span style="float:right">
                        {{date('F j, Y ', strtotime("$pop->date"))}} &nbsp;
                      </span>
                    </p>
                  </div>
                </div>
              </li>
            @endforeach
          </ul>
        </section>
      </div>

      <div class="col-lg-3" style="background-color:#E9FFFF">
        <div class="row" style="padding-top:15px">
          <h3 style="text-align:center;width:100%;text-shadow: 1px 1px 1px #EB49C7;">Music Reviews</h3>
          @foreach ($weeklymusic as $music)
            <div class="containment" >
              <a href="/pop-culture/{{$music->slug}}" class="empty">
                <img src="{{$music->header_url}}" class="contained" alt="">
                <div class="bottom-left"> <h4>{{$music->title}}</h4> </div>
                <div class="top-right"> <p style="margin:0;">{{date('F j, Y', strtotime($music->date))}}</p> </div>
              </a>
            </div>
          @endforeach
        </div>
        <div class="row" style="padding-top:20px">

        </div>

      </div>

    </div>


  </div>

@endsection
