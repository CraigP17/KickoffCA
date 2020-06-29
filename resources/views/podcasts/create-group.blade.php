@extends('layout')

@section('content')

  <br>
  <div class="container">

    <h1 class="title">Create a Podcast Group</h1>

    <form method="POST" action="/podcasts" enctype="multipart/form-data">
      {{ csrf_field() }}


      @include('errors')
      <div class="field">
        <label class="label" for="name">Podcast Group Name</label>

        <div class="control">
          <input
            class="input {{ $errors->has('name') ? 'is-danger' : '' }}"
            type="text"
            name="name"
            value="{{ old('name')}}"
            required>
        </div>
      </div>

      <div class="field">
        <label class="label" for="authors">Author</label>

        <div class="control">
          <textarea
            name="authors"
            class="textarea {{ $errors->has('authors') ? 'is-danger' : '' }}"
            >{{ old('authors')}}</textarea>
        </div>
        <p class="help">Names must be separated by a comma.</p>
      </div>

      <div class="field">
        <label class="label" for="description">Description</label>

        <div class="control">
          <textarea
            name="description"
            class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}"
            required>{{ old('description')}}</textarea>
        </div>
      </div>

      <div class="field ">
        <label class="label" for="profile_pic">Profile Image</label>

        <div class="control">
          <input type="file" name="profile_pic" class="form-control" required>
        </div>
      </div>

      <div class="field">
        <label class="label" for="sport">Sport Category</label>

        <div class="control">
          <input
            class="input {{ $errors->has('sport') ? 'is-danger' : '' }}"
            type="text"
            name="sport"
            value="{{ old('sport')}}">
        </div>
      </div>

      <div class="field is-grouped">
        <label class="label" for="apple"> Apple Podcasts Link </label>

        <div class="control">
          <input
            class="input {{ $errors->has('apple') ? 'is-danger' : '' }}"
            type="text"
            name="apple"
            value="{{ old('apple')}}">
        </div>

        <label class="label" for="spotify">Spotify Link </label>

        <div class="control">
          <input
            class="input {{ $errors->has('spotify') ? 'is-danger' : '' }}"
            type="text"
            name="spotify"
            value="{{ old('spotify')}}">
        </div>
      </div>


      <div class="field is-grouped">
        <label class="label" for="other">Other Platform Name </label>

        <div class="control">
          <input
            class="input {{ $errors->has('other_name') ? 'is-danger' : '' }}"
            type="text"
            name="other_name"
            value="{{ old('other_name')}}">
        </div>

        <label class="label" for="other">Other Platform Link</label>

        <div class="control">
          <input
            class="input {{ $errors->has('other_link') ? 'is-danger' : '' }}"
            type="text"
            name="other_link"
            value="{{ old('other_link')}}">
        </div>
        <p class="help">For other platform, it is whole link (http) to whichever page</p>
      </div>

      <div class="field">
        <div class="control">
          <button type="submit" class="button is-link">Create Group</button>
        </div>
      </div>

    </form>

  </div>
  <br><br><br><br><br>
@endsection
