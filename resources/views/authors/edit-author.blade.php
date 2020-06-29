@extends('layout')

@section('content')

  <br>
  <div class="container">

    <h1 class="title" style="text-align:center">Edit Author</h1>

    <form method="POST" action="/authors/{{$author->slug}}" enctype="multipart/form-data">
      {{ method_field('PATCH') }}
      {{ csrf_field() }}


      @include('errors')
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="name">Author's Name</label>
        </div>

        <div class="field-body">
          <div class="field">
            <p class="control is-expanded" style="margin-bottom:3px;">
              <input
                class="input {{ $errors->has('name') ? 'is-danger' : '' }}"
                type="text"
                name="name"
                placeholder="Name"
                value="{{ $author->name }}"
                required>
            </p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="description">Description</label>
        </div>

        <div class="field-body">
          <div class="field">
            <div class="control is-expanded">
              <textarea
                name="description"
                class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}"
                required>{{ $author->description }}</textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="profile_pic">Profile Picture</label>
        </div>

        <div class="field-body">
          <div >
            <div class="control is-expanded">
              <input type="file" name="profile_pic" class="form-control">Current: "{{$author->profile_pic}}"
              <img src="/storage/Images/Authors/{{$author->profile_pic}}" alt="" class="edit-img">
            </div>
          </div>
        </div>

      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="twitter">Twitter&commat;</label>
        </div>

        <div class="field">
          <div class="control">
            <input
              class="input {{ $errors->has('twitter') ? 'is-danger' : '' }}"
              type="text"
              name="twitter"
              value="{{$author->twitter}}">
          </div>
        </div>

        <div class="field-label is-normal">
          <label class="label" for="youtube">YoutubeURL</label>
        </div>

        <div class="field-body">
          <div class="field">
            <div class="control">
              <input
                class="input {{ $errors->has('youtube') ? 'is-danger' : '' }}"
                type="text"
                name="youtube"
                value="{{$author->youtube}}">
            </div>
          </div>
        </div>

        <div class="field-label is-normal">
          <label class="label" for="email">Email</label>
        </div>

        <div class="field-body">
          <div class="field">
            <div class="control">
              <input
                class="input {{ $errors->has('email') ? 'is-danger' : '' }}"
                type="text"
                name="email"
                value="{{ $author->email}}">
            </div>
          </div>
        </div>
      </div>

      <div class="field">
        <div class="control">
          <button type="submit" class="button is-link">Update Author</button>
        </div>
      </div>

    </form>

    <form action="/authors/{{ $author->slug }}" method="POST">
      @method('DELETE')
      @csrf
      <div class="field">
        <div class="control">
          <button type="submit" class="button">Delete Author</button>
        </div>
      </div>
    </form>

  </div>
  <br><br><br><br><br>
@endsection
