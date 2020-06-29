@extends('layout')

@section('title')
  Edit League
@endsection

@section('content')

  <br>
  <div class="container">

    <h1 class="title" style="width:100%;text-align:center;">Edit League</h1>

    <form method="POST" action="/sports/{{$league->parent_slug}}/{{$league->slug}}"
      enctype="multipart/form-data">
      {{ method_field('PATCH') }}
      {{ csrf_field() }}

      @include('errors')

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="name">League Name</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded" style="margin-bottom:3px;">
              <input
                class="input {{ $errors->has('name') ? 'is-danger' : '' }}"
                type="text"
                name="name"
                placeholder="League"
                value="{{ $league->name }}"
                required>
            </p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="parentSport">Sport Name</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded" style="margin-bottom:3px;">
              <input
                class="input {{ $errors->has('parentSport') ? 'is-danger' : '' }}"
                type="text"
                name="parentSport"
                placeholder="Sport"
                value="{{ $league->parentSport }}"
                required>
            </p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="img_logo">Logo Image</label>
        </div>
        <div class="control">
          <input type="file" name="img_logo" class="form-control">Current: "{{$league->img_logo}}"
          <img src="/storage/Images/Leagues/{{$league->img_logo}}" alt="" class="edit-img">
        </div>
      </div>

      <div class="field">
        <div class="control">
          <button type="submit" class="button is-link">Update League</button>
        </div>
      </div>

    </form>

    <form action="/leagues/{{$league->slug}}" method="POST">
      @method('DELETE')
      @csrf
      <div class="field">
        <div class="control">
          <button type="submit" class="button">Delete League</button>
        </div>
      </div>
    </form>

  </div>
  <br><br><br><br><br>

@endsection
