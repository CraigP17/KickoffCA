@extends('layout')

@section('title')
  Kickoff - About
@endsection

@section('content')
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-5">
        <div class="d-none d-md-block" style="text-align:center;width:100%">
          <img src="/storage/Images/KLogo.png" alt="Logo" id="KLogo">
        </div>
      </div>

      <div class="col-md-7" id="about-uss">
        <div>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <h2 class="title" id="aboutpad">About Us</h2>
          </div>

          <h5 class="about-us">
            The Kickoff is a transmedia platform designed to be used as a
            promotional vehicle for the articles, podcasts, radio shows,
            features, and long-form pieces of aspiring members of the media
            industry. Driven by a motivation to form a network with a
            mutually-beneficial relationship with our contributors, the site is
            built to facilitate their interests to post whatever, whenever. The
            platform seeks to cover anything from Pop Culture to Sports with
            unrestricted flexibility to produce whatever content our contributors
            wish.
          </h6>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12" id="abouttop">
        <div id="centered">
          <div class="d-flex justify-content-center justify-content-lg-start">
            <h2 class="title" id="aboutpad">Contact Us</h2>
          </div>

          <h5 class="about-us">
            If you have any questions, reach out and we'll get respond as soon
            as we can. You can simply message us through our social media platforms on
            Instagram or Twitter, <span id="kickred"> <b>&commat;TheKickoffCA</b> </span> .
             Or send an email to
            <a href="mailto:thekickoffca@gmail.com?subject=feedback" id="kickred"> <b>TheKickoffCA@gmail.com</b> </a>
          </h6>
        </div>

        <br>

      </div>

      <div class="col-md-5">

      </div>
    </div>
  </div>
@endsection
