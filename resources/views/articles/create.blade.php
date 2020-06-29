@extends('layout')

@section('title')
  Create an Article
@endsection


@section('content')

  <br>
  <div class="container">

    <h1 class="title" style="width:100%;text-align:center;">Add a New Article</h1>

    <form method="POST" action="/articles" enctype="multipart/form-data">
      {{ csrf_field() }}

      @include('errors')

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="title">Article Title*</label>
        </div>

        <div class="field-body">
          <div class="field">
            <p class="control is-expanded" style="margin-bottom:3px;">
              <input
                class="input {{ $errors->has('title') ? 'is-danger' : '' }}"
                type="text"
                name="title"
                placeholder="Title"
                value="{{ old('title')}}"
                required>
            </p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="author">Author*</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded" style="margin-bottom:3px;">
              <input
                class="input {{ $errors->has('author') ? 'is-danger' : '' }}"
                type="text"
                name="author"
                placeholder="Author"
                value="{{ old('author') }}"
                required>
            </p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="description">Description*</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <textarea
                name="description"
                placeholder="Description of the Article"
                class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}"
                required>{{ old('description')}}</textarea>
            </div>
            <p class="help" style="margin:0;">Max 255 characters. Can be description or beginning of article</p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="date">Date*</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded" style="margin-bottom:3px;">
              <input
                class="input {{ $errors->has('date') ? 'is-danger' : '' }}"
                type="text"
                name="date"
                placeholder="YYYY-MM-DD hh:mm:ss"
                value="{{ old('date')}}"
                required>
            </p>
            <p class="help" style="margin:0;">Format: YYYY-MM-DD hh:mm:ss. Include dashes and colons.</p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="sport">Sport*</label>
        </div>
        <div class="field-body">
          <div>
            <p class="control" style="margin-bottom:3px;">
              <input
                class="input {{ $errors->has('sport') ? 'is-danger' : '' }}"
                type="text"
                name="sport"
                placeholder="Sport"
                value="{{ old('sport') }}"
                required>
            </p>
            <p class="help" style="margin:0;">Write 'All' if multiple sports. Write 'Pop Culture' if fitting.
              Ensure proper spelling and valid sports</p>
          </div>

          <div class="field-label is-normal">
            <label class="label" for="league">League</label>
          </div>
          <div>
            <p class="control" style="margin-bottom:3px;">
              <input
                class="input {{ $errors->has('league') ? 'is-danger' : '' }}"
                type="text"
                name="league"
                placeholder="MLB"
                value="{{ old('league') }}">
            </p>
            <p class="help" style="margin:0;">Use abbrev when possible. Ex: NBA </p>
          </div>
        </div>
      </div>

      <div class="field" style="margin-left:175px;">

        <label class="checkbox" style="margin-right:25px;">
          <input type="checkbox" name="main_article" value="1"> <b>Main Article</b>
        </label>

        <label class="checkbox">
          <input type="checkbox" name="top_headline" value="1"> <b>Top Headline</b>
        </label>

        <p class="help">
          <b>Main Article</b> means, it can be the large main article on the home page.
          <b>Top Headline</b> means the article will be represented by a card on the home page.
          <b style="font-size:130%">(Do Not Select Both Options For the Same Article to Avoid Article Being Displayed Twice)</b>
        </p>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="header_img">Header Image Upload*</label>
        </div>

        <div class="control">
          <input type="file" name="header_img" class="form-control" required>
        </div>

        <div class="field-label is-normal">
          <label class="label" for="header_source">Header Image Source*</label>
        </div>

        <div class="control">
          <input
            class="input {{ $errors->has('header_source') ? 'is-danger' : '' }}"
            type="text"
            name="header_source"
            value="{{ old('header_source')}}"
            required>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="content_1">Content Part 1*</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <textarea
                name="content_1"
                placeholder="Article Content"
                class="textarea {{ $errors->has('content_1') ? 'is-danger' : '' }}"
                required>{{ old('content_1')}}</textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="image_1">In-Article Image 1</label>
        </div>
        <div class="field-body">
          <div class="control">
            <input type="file" name="image_1" class="form-control">
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="img1_caption">Image 1 Caption</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded">
              <input
                class="input {{ $errors->has('img1_caption') ? 'is-danger' : '' }}"
                type="text"
                name="img1_caption"
                value="{{ old('img1_caption') }}">
            </p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="content_2">Content Part 2</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <textarea
                name="content_2"
                class="textarea {{ $errors->has('content_2') ? 'is-danger' : '' }}"
              >{{ old('content_2')}}</textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="image_2">In-Article Image 2</label>
        </div>
        <div class="field-body">
          <div class="control">
            <input type="file" name="image_2" class="form-control">
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="img2_caption">Image 2 Caption</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded">
              <input
                class="input {{ $errors->has('img2_caption') ? 'is-danger' : '' }}"
                type="text"
                name="img2_caption"
                value="{{ old('img2_caption')}}">
            </p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="content_3">Content Part 3</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <textarea
                name="content_3"
                class="textarea {{ $errors->has('content_3') ? 'is-danger' : '' }}"
                >{{ old('content_3')}}</textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="image_3">In-Article Image 3</label>
        </div>
        <div class="field-body">
          <div class="control">
            <input type="file" name="image_3" class="form-control">
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="img3_caption">Image 3 Caption</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control is-expanded">
              <input
                class="input {{ $errors->has('img3_caption') ? 'is-danger' : '' }}"
                type="text"
                name="img3_caption"
                value="{{ old('img3_caption')}}">
            </p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label" for="content_4">Content Part 4</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <textarea
                name="content_4"
                class="textarea {{ $errors->has('content_4') ? 'is-danger' : '' }}"
                >{{ old('content_4')}}</textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="field">
        <div class="control">
          <button type="submit" class="button is-link">Create Article</button>
        </div>
      </div>

    </form>

  </div>
  <br><br><br><br><br>
@endsection
