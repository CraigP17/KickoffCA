@extends('layout')

@section('title')
  All Stats of the Day
@endsection

@section('content')

  <div class="container">
    <div class="row">
      <h1 style="text-align: center;width:100%;background-color:#E5E5E5;margin:0;padding:20px;">All Stats OTD</h1>
      @foreach ($stats as $stat)
        <div class="col-md-6" style="border:1px solid black;border-radius:2%;margin-bottom:5px;">
          <h4>{{$stat->date_word}}</h4>
          <p style="margin:0">{{$stat->statistic}}</p>
          <p style="margin:0"> <i> <a href="{{$stat->source}}" target='_blank' >{{$stat->source_title}}</a> </i> </p>
          <div class="row" style="padding-left:15px;">

              <a href="/statsotd/{{$stat->slug}}/edit" class="button is-link">Edit Stat</a>

              <form action="/statsotd/{{ $stat->slug }}" method="POST">
                @method('DELETE')
                @csrf
                <div class="field">
                  <div class="control">
                    <button type="submit" class="button">Delete Stat</button>
                  </div>
                </div>
              </form>

          </div>
        </div>
      @endforeach
    </div>
  </div>
  <br>
  <br>
@endsection
