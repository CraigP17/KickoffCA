@extends('layout')

@section('content')

  <br>
  <div class="container">

    <h1 class="title">Create a Podcast Group</h1>

    <form method="POST" action="/podcasts/{{$podcast->slug}}" style="margin-bottom:1em;" enctype="multipart/form-data">
      {{ method_field('PATCH') }}
      {{ csrf_field() }}


      @include('errors')
      <div class="field">
        <label class="label" for="name">Podcast Group Name</label>

        <div class="control">
          <input
            class="input {{ $errors->has('name') ? 'is-danger' : '' }}"
            type="text"
            name="name"
            value="{{ $podcast->name }}"
            required>
        </div>
      </div>

      <div class="field">
        <label class="label" for="authors">Authors</label>

        <div class="control">
          <textarea
            name="authors"
            class="textarea {{ $errors->has('authors') ? 'is-danger' : '' }}"
            >{{ $podcast->authors }}</textarea>
        </div>
        <p class="help">Names must be separated by a comma.</p>
      </div>

      <div class="field">
        <label class="label" for="description">Description</label>

        <div class="control">
          <textarea
            name="description"
            class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}"
            required>{{ $podcast->description }}</textarea>
        </div>
      </div>

      <!-- TODO: Add Profile Image Submission -->
      <div class="field ">
        <label class="label" for="profile_pic">Profile Image</label>

        <div class="control">
          <input type="file" name="profile_pic" class="form-control" >Current: "{{$podcast->profile_pic}}"
          <img src="/storage/Images/Podcasts/{{$podcast->profile_pic}}" alt="" class="edit-img">
        </div>
      </div>

      <div class="field">
        <label class="label" for="sport">Sport Category</label>

        <div class="control">
          <input
            class="input {{ $errors->has('sport') ? 'is-danger' : '' }}"
            type="text"
            name="sport"
            value="{{ $podcast->sport }}">
        </div>
      </div>

      <div class="field is-grouped">
        <label class="label" for="apple"> Apple Podcasts Link </label>

        <div class="control">
          <input
            class="input {{ $errors->has('apple') ? 'is-danger' : '' }}"
            type="text"
            name="apple"
            value="{{ $podcast->apple }}">
        </div>

        <label class="label" for="spotify">Spotify Link </label>

        <div class="control">
          <input
            class="input {{ $errors->has('spotify') ? 'is-danger' : '' }}"
            type="text"
            name="spotify"
            value="{{ $podcast->spotify }}">
        </div>
      </div>


      <div class="field is-grouped">
        <label class="label" for="other">Other Platform Name </label>

        <div class="control">
          <input
            class="input {{ $errors->has('other_name') ? 'is-danger' : '' }}"
            type="text"
            name="other_name"
            value="{{ $podcast->other_name }}">
        </div>

        <label class="label" for="other">Other Platform Link</label>

        <div class="control">
          <input
            class="input {{ $errors->has('other_link') ? 'is-danger' : '' }}"
            type="text"
            name="other_link"
            value="{{ $podcast->other_link }}">
        </div>
      </div>

      <div class="field">
        <div class="control">
          <button type="submit" class="button is-link">Update Project</button>
        </div>
      </div>

    </form>

    <form action="/podcasts/{{ $podcast->slug }}" method="POST">
      @method('DELETE')
      @csrf
      <div class="field">
        <div class="control">
          <button type="submit" class="button">Delete Project</button>
        </div>
      </div>
    </form>

  </div>
  <br><br><br><br><br>
@endsection
