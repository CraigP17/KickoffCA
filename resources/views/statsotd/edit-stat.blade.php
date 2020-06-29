@extends('layout')

@section('title')
  Add a Stat
@endsection

@section('content')

  <br>
  <div class="container">
    <div class="row">
      <h1 class="title" style="width:100%;text-align:center;">Edit Stat of the Day</h1>

      <form method="POST" action="/statsotd/{{$stat->slug}}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        @include('errors')

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label" for="date">Day</label>
          </div>

          <div class="field-body">
            <div class="field">
              <p class="control is-expanded" style="margin-bottom:3px;">
                <input
                  class="input {{ $errors->has('name') ? 'is-danger' : '' }}"
                  type="text"
                  name="date"
                  value="{{ $stat->date }}"
                  required>
              </p>
            </div>
            <p class="help">The Date must be in format YYYY-MM-DD. Include dashes. Make the YYYY the year of when it is to be displayed</p>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label" for="statistic">Statistic</label>
          </div>

          <div class="field-body">
            <div class="field">
              <p class="control is-expanded" style="margin-bottom:3px;">
                <input
                  class="input {{ $errors->has('statistic') ? 'is-danger' : '' }}"
                  type="text"
                  name="statistic"
                  value="{{ $stat->statistic }}"
                  required>
              </p>
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label" for="source">Source</label>
          </div>
          <div class="field-body">
            <div class="field">
              <p class="control is-expanded" style="margin-bottom:3px;">
                <input
                  class="input {{ $errors->has('source') ? 'is-danger' : '' }}"
                  type="text"
                  name="source"
                  placeholder="http: //www.kickoff.ca/whichever"
                  value="{{ $stat->source }}"
                  required>
              </p>
              <p class="help">Should be an exact link to the page, including http and whatnot</p>
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label" for="source_title">Source Title</label>
          </div>
          <div class="field-body">
            <div class="field">
              <p class="control is-expanded" style="margin-bottom:3px;">
                <input
                  class="input {{ $errors->has('source_title') ? 'is-danger' : '' }}"
                  type="text"
                  name="source_title"
                  placeholder="Baseball Reference/Miguel-Cabrera"
                  value="{{ $stat->source_title }}"
                  required>
              </p>
              <p class="help">Whatever you want the source name to be displayed as</p>
            </div>
          </div>
        </div>


        <div class="field">
          <div class="control">
            <button type="submit" class="button is-link">Update Stat</button>
          </div>
        </div>

      </form>

    </div>
  </div>
  <br>
  <br><br><br><br>
@endsection
