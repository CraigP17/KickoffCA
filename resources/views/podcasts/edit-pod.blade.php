@extends('layout')

@section('title') Kickoff - {{$pod->name}} @endsection

@section('content')

  <div class="container">

    <br>

    <div class="row">
      <h1 class="title" style="width:100%;">Editting Episode</h1>

      <form method="POST" action="/episodes/{{$pod->id}}" style="width:75%;">
        {{ method_field('PATCH') }}
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
                  value="{{ $pod->name }}"
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
                  class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}"
                  required>{{ $pod->description }}</textarea>
              </div>
            </div>
          </div>
        </div>
        
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label" for="time">Time Length</label>
          </div>
          <div class="field-body">
            <div class="field">
              <p class="control is-expanded" style="margin-bottom:3px;">
                <input
                  class="input {{ $errors->has('time') ? 'is-danger' : '' }}"
                  type="text"
                  name="time"
                  placeholder="1:23"
                  value="{{ $pod->time }}"
                  required>
              </p>
              <p class="help" style="margin:0;">Length of Episode 19:06, 64:12</p>
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
                  class="input {{ $errors->has('name') ? 'is-danger' : '' }}"
                  type="text"
                  name="date"
                  placeholder="YYYY-MM-DD"
                  value="{{ $pod->date }}"
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
                <button type="submit" class="button is-link">Update Episode</button>
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>

    <br><br>


    <form action="/episodes/{{ $pod->id }}" method="POST">
      @method('DELETE')
      @csrf
      <div class="field">
        <div class="control">
          <button type="submit" class="button">Delete Episode</button>
        </div>
      </div>
    </form>

    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

  </div>

@endsection
