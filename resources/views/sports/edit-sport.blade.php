@extends('layout')

@section('title')
  Edit Sport
@endsection

@section('content')

  <br>
  <div class="container">

    <h1 class="title" style="width:100%;text-align:center;">Edit Sport</h1>

    <form method="POST" action="/sports/{{$sport->slug}}" enctype="multipart/form-data">
      {{ method_field('PATCH') }}
      {{ csrf_field() }}

      @include('errors')

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="name">Sport Name</label>
        </div>

        <div class="field-body">
          <div class="field">
            <p class="control is-expanded" style="margin-bottom:3px;">
              <input
                class="input {{ $errors->has('name') ? 'is-danger' : '' }}"
                type="text"
                name="name"
                placeholder="Sport"
                value="{{ $sport->name }}"
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
          <input type="file" name="img_logo" class="form-control">Current: "{{$sport->img_logo}}"
          <img src="/storage/Images/Sports/{{$sport->img_logo}}" alt="" class="edit-img">
        </div>

        <div class="field-label is-normal">
          <label class="label" for="img_header">Header Image</label>
        </div>

        <div class="control">
          <input type="file" name="img_header" class="form-control">Current: "{{$sport->img_header}}"
          <img src="/storage/Images/Sports/{{$sport->img_header}}" alt="" class="edit-img">
        </div>
      </div>

      <div class="field">
        <div class="control">
          <button type="submit" class="button is-link">Update Sport</button>
        </div>
      </div>

    </form>

    <form action="/sports/{{ $sport->slug }}" method="POST">
      @method('DELETE')
      @csrf
      <div class="field">
        <div class="control">
          <button type="submit" class="button">Delete Sport</button>
        </div>
      </div>
    </form>

  </div>
  <br><br><br><br><br>

@endsection
