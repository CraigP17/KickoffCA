@extends('layout')

@section('title') Kickoff - {{$podcast->name}} @endsection

@section('content')

    <div class="container-fluid" id="backgroundImg">
        <div class="container" id="backwhey">
            <div class="row" id="padtopbot">

                <div class="col-md-3 text-center">
                    <img src="{{$podcast->dp_url}}" alt="{{$podcast->name}} Profile Picture" class="podcast-img-about">
                </div>

                <div class="col-md-9" id="podcast-profile">
                    <h1>{{$podcast->name}}</h1>
                    <p>{{$podcast->description}}</p>
                    <h4 class="textRed">
                        @php
                            for ($i=0; $i < sizeof($verified); $i++) {
                                echo "<a href='/authors/" . $verified[$i]->slug . "' class='textRed'>" . $verified[$i]->name . "</a>";
                                if ($i < sizeof($verified) - 1) {echo ", ";}
                            }
                            if (sizeof($verified) != 0 && sizeof($unverified) != 0) echo ", ";
                            for ($j=0; $j < sizeof($unverified); $j++) {
                                echo "<span class='textRed'>" . $unverified[$j] . "</span>";
                                if ($j < sizeof($unverified) - 1) {echo ", ";}
                            }
                        @endphp
                    </h4>
                    <h3>
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
                    <h1 class="title mb-3">
                        <a href="/podcasts/{{$podcast->slug}}/edit">Edit Podcast Group</a>
                    </h1>

                    <h1 class="title w-100">Add an Episode</h1>

                    <form method="POST" action="/podcasts/{{$podcast->slug}}/pod" class="w-75">
                        @csrf

                        @include('errors')

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label" for="name">Episode Name</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <p class="control is-expanded mb-1">
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
                            <label class="label" for="time">Episode Name</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control is-expanded mb-1">
                                    <input
                                    class="input {{ $errors->has('time') ? 'is-danger' : '' }}"
                                    type="text"
                                    name="time"
                                    placeholder="1:23"
                                    value="{{ old('time')}}"
                                    required>
                                </p>
                                <p class="help m-0">Length of Episode 19:06, 64:12</p>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label" for="date">Date</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control is-expanded mb-1">
                                    <input
                                    class="input {{ $errors->has('date') ? 'is-danger' : '' }}"
                                    type="text"
                                    name="date"
                                    placeholder="YYYY-MM-DD"
                                    value="{{ old('date')}}"
                                    required>
                                </p>
                                <p class="help m-0">Format: YYYY-MM-DD. Include dashes.</p>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal mb-2">
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

                <div class="pods w-100">
                    <ul class="list-group list-group-flush">
                        @foreach ($podcast->pods as $episode)
                            <li class="list-group-item">
                                <h3 class="mt-2">{{$episode->name}}
                                    <span class="d-none d-lg-block text-70 floatRight">{{(new dateTime($episode->date))->format('F j, Y')}}</span>
                                </h3>
                                <p class="mb-2 text-justify text-sm-left">
                                    {{$episode->description}}
                                    <span class="d-none d-lg-block floatRight">{{$episode->time}}</span>
                                </p>
                                <p class="d-block d-lg-none textRed">
                                    {{(new dateTime($episode->date))->format('F j, Y')}}
                                    <span class="floatRight">{{$episode->time}}</span>
                                </p>
                                @auth
                                    <h6 class="mb-2">
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
