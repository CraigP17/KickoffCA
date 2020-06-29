@extends('layout')

@section('title')
  Add a Stat
@endsection

@section('content')
  <br>
  <div class="container">
    <div class="row">
      <h1 class="title" style="width:100%;text-align:center;">Add a Stat of the Day</h1>

      <form method="POST" action="/statsotd">
        {{ csrf_field() }}

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
                  placeholder="YYYY-MM-DD"
                  value="{{ old('date')}}"
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
                  placeholder="Statistic"
                  value="{{ old('statistic')}}"
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
                  value="{{ old('source')}}"
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
                  value="{{ old('source_title')}}"
                  required>
              </p>
              <p class="help">Whatever you want the source name to be displayed as</p>
            </div>
          </div>
        </div>


        <div class="field" style="margin-left:175px">
          <div class="control">
            <button type="submit" class="button is-link">Add Stat</button>
          </div>
        </div>

      </form>

    </div>
  </div>
  <br>
  <br><br><br><br>
@endsection
