@extends('layout')

@section('title')
  Add a League
@endsection

@section('content')

  <div class="container">

    <h1 class="title" style="width:100%;text-align:center;">Add a League</h1>

    <form method="POST" action="/sports/leagues" enctype="multipart/form-data">
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
                value="{{ old('name')}}"
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
                value="{{ old('parentSport')}}"
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
          <input type="file" name="img_logo" class="form-control" required>
        </div>
      </div>

      <div class="field">
        <div class="control">
          <button type="submit" class="button is-link">Add League</button>
        </div>
      </div>

    </form>

  </div>
  <br><br><br><br><br>

@endsection
