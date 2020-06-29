@extends('layout')

@section('content')

  <br>
  <div class="container">

    <h1 class="title">Edit a Kickoff Podcast Clip</h1>

    <form method="POST" action="/kickoffclips/{{$clip->slug}}">
      {{ method_field('PATCH') }}
      {{ csrf_field() }}

      @include('errors')

      <div class="field">
        <label class="label" for="group_name">Podcast Group Name</label>

        <div class="control">
          <input
            class="input {{ $errors->has('group_name') ? 'is-danger' : '' }}"
            type="text"
            name="group_name"
            value="{{ $clip->group_name }}"
            required>
        </div>
      </div>

      <div class="field">
        <label class="label" for="name">Title of Clip</label>

        <div class="control">
          <input
            class="input {{ $errors->has('name') ? 'is-danger' : '' }}"
            type="text"
            name="name"
            value="{{ $clip->name }}"
            required>
        </div>
      </div>

      <div class="field">
        <label class="label" for="sport">Sport Category</label>

        <div class="control">
          <input
            class="input {{ $errors->has('sport') ? 'is-danger' : '' }}"
            type="text"
            name="sport"
            value="{{ $clip->sport }}">
        </div>
      </div>

      <div class="field is-grouped">
        <div class="field-label is-normal">
          <label class="label" for="date">Day</label>
        </div>

        <div class="control is-expanded" style="margin-bottom:3px;">
          <input
            class="input {{ $errors->has('name') ? 'is-danger' : '' }}"
            type="text"
            name="date"
            placeholder="YYYY-MM-DD"
            value="{{ $clip->date }}"
            required>
          <p class="help">The Date must be in format YYYY-MM-DD. Include dashes.</p>
        </div>

        <div class="field-label is-normal">
          <label class="label" for="duration">Duration Time</label>
        </div>

        <div class="control is-expanded">
          <input
            class="input {{ $errors->has('duration') ? 'is-danger' : '' }}"
            type="text"
            name="duration"
            placeholder="1:09"
            value="{{ $clip->duration }}">
            <p class="help">Duration to be displayed 4:11, 1:17</p>
        </div>
      </div>

      <div class="field">
        <label class="label" for="link">Spotify Link </label>

        <div class="control">
          <input
            class="input {{ $errors->has('link') ? 'is-danger' : '' }}"
            type="text"
            name="link"
            value="{{ $clip->link }}">
        </div>
        <p class="help">It is whole link (http) to whichever page</p>
      </div>

      <div class="field">
        <div class="control">
          <button type="submit" class="button is-link">Update Clip</button>
        </div>
      </div>

    </form>


    <form action="/kickoffclips/{{ $clip->slug }}" method="POST">
      @method('DELETE')
      @csrf
      <div class="field">
        <div class="control">
          <button type="submit" class="button">Delete Clip</button>
        </div>
      </div>
    </form>

  </div>
  <br><br><br><br><br>
@endsection
