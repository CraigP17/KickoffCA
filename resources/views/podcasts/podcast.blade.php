@extends('layout')

@section('title') Kickoff - {{$podcast->name}} @endsection

@section('content')

  <div class="container-fluid" id="backgroundImg">
    <div class="container" id="backwhey">
      <div class="row" id="padtopbot">

        <div class="col-md-3" style="text-align:center;">
          <img src="{{$podcast->dp_url}}" alt="" class="podcast-img-about">
        </div>

        <div class="col-md-9" style="font-size:125%;text-align:center;
        justify-content:center;padding:35px;padding-top:5px;padding-bottom:0">
          <h1>{{$podcast->name}}</h1>
          <p>{{$podcast->description}}</p>
          <h4 id="textRed">{{$podcast->authors}}</h4>
          <h3 id="textRed">
            @isset($podcast->spotify)
              <a href="{{$podcast->spotify}}" target="_blank">Spotify</a>
            @endisset
            @isset($podcast->apple)
              &nbsp; &#124; &nbsp;
              <a href="{{$podcast->apple}}" target="_blank">Apple Podcasts</a>
            @endisset
            @isset($podcast->other_link)
              &nbsp; &#124; &nbsp;
              <a href="{{$podcast->other_link}}" target="_blank">{{$podcast->other_name}}</a>
            @endisset
          </h3>
        </div>

      </div>

      @auth
        <div class="row">
          <h1 class="title" style="margin-bottom:15px;">
            <a href="/podcasts/{{$podcast->slug}}/edit">Edit Podcast Group</a>
          </h1>

          <h1 class="title" style="width:100%;">Add an Episode</h1>

          <form method="POST" action="/podcasts/{{$podcast->slug}}/pod" style="width:75%;">
            @csrf

            @include('errors')

            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label" for="name">Episode Name</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <p class="control is-expanded" style="margin-bottom:3px;">
                    <input
                      class="input {{ $errors->has('name') ? 'is-danger' : '' }}"
                      type="text"
                      name="name"
                      placeholder="Name"
                      value="{{ old('name')}}"
                      required>
                  </p>
                  <p class="help" style="margin:0;">Include "Episode #:" if necessary</p>
                </div>
              </div>
            </div>

            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label" for="description">Description</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <textarea
                      name="description"
                      placeholder="Description of the Episode"
                      class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}"
                      value = "{{ old('description')}}"
                      required></textarea>
                  </div>
                </div>
              </div>
            </div>

            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label" for="date">Date</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <p class="control is-expanded" style="margin-bottom:3px;">
                    <input
                      class="input {{ $errors->has('date') ? 'is-danger' : '' }}"
                      type="text"
                      name="date"
                      placeholder="YYYY-MM-DD"
                      value="{{ old('date')}}"
                      required>
                  </p>
                  <p class="help" style="margin:0;">Format: YYYY-MM-DD. Include dashes.</p>
                </div>
              </div>
            </div>

            <div class="field is-horizontal">
              <div class="field-label">
                <!-- Left empty for spacing -->
              </div>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <button type="submit" class="button is-link">Add Episode</button>
                  </div>
                </div>
              </div>
            </div>

          </form>
        </div>
      @endauth

      <div class="row">

        <div class="pods" style="width:100%">
          <ul class="list-group list-group-flush">
            @foreach ($podcast->pods as $episode)
              <li class="list-group-item">
                <h2>{{$episode->name}}
                  <span style="float:right;font-size:75%;" id="floatRight">{{(new dateTime($episode->date))->format('F j, Y')}}</span>
                </h2>
                <p>{{$episode->description}}</p>

                @auth
                  <h6 style="margin-bottom:15px;">
                    <a href="/episodes/{{$episode->id}}/edit">Edit Episode</a>
                  </h6>
                @endauth
              </li>
            @endforeach
          </ul>
        </div>

      </div>

      <br>

    </div>
  </div>

@endsection
