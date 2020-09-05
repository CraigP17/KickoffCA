<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Craig Pinto">

        <link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel='stylesheet'>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fenix">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ URL::asset('js/script.js') }}" type="text/javascript" ></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <title> @yield('title', 'The Kickoff Pop Culture') </title>

    </head>
    
    <body>
        
        <div class="w-100" id="pop-backLogo">
            <picture>
                <source media="(min-width:465px)" srcset="https://kickoff-test.s3.ca-central-1.amazonaws.com/images/layout/KickoffPopTextbig.png">
                    <img src="https://kickoff-test.s3.ca-central-1.amazonaws.com/images/layout/KickoffPopTextbig.png" alt="Kickoff Logo" class="pop-logoimg">
            </picture>
        </div>

        <nav class="navbar sticky-top navbar-expand-lg navbar-dark py-0" style="background: linear-gradient(to bottom, #2B2B2B 0%, #141414 100%);">

            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto nav-justified w-100">

                    <li class="nav-item"><a class="nav-link" href="/"> HOME </a></li>

                    <li class="nav-item"><a class="nav-link" href="/podcasts"> PODCASTS </a></li>

                    <li class="nav-item dropdown text-center">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            SPORTS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: #202020">
                            <a class="dropdown-item text-center" id="navDropLink" href="/sports/baseball">Baseball</a>
                            <a class="dropdown-item text-center" id="navDropLink" href="/sports/basketball">Basketball</a>
                            <a class="dropdown-item text-center" id="navDropLink" href="/sports/football">Football</a>
                            <a class="dropdown-item text-center" id="navDropLink" href="/sports/hockey">Hockey</a>
                            <a class="dropdown-item text-center" id="navDropLink" href="/sports">All Sports</a>
                        </div>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="/pop-culture">POP CULTURE</a></li>

                    <li class="nav-item"><a class="nav-link" href="/about">ABOUT</a></li>
                </ul>

            </div>

            <div class="ml-auto">
                <span class="navbar-text mr-1 d-none d-sm-inline-block py-0" href="#" id="textWhite">
                    <h5 class="mb-0 py-0">&#64;TheKickOffCA</h5>
                </span>
                <a class="navbar-text m-0 py-0" target="_blank" href="https://twitter.com/thekickoffca">
                    <img src="https://kickoff-test.s3.ca-central-1.amazonaws.com/images/social-logos/twitter.png" alt="Twitter" id="twitter">
                </a>
                <a class="navbar-text m-0 py-0" target="_blank" href="https://www.instagram.com/thekickoffca/">
                    <img src="https://kickoff-test.s3.ca-central-1.amazonaws.com/images/social-logos/instagram.png" alt="Instagram" id="instagram">
                </a>
            </div>

        </nav>

        @yield('content')

        <!--Back to Top Button-->
        <button onclick="topFunction()" id="btop" title="Go to top"> <i class="fas fa-chevron-up" style="font-size:150%;"></i> </button>

        <footer>

        <div class="footers">
            <div class="row">
                <div class="col-md-6 text-md-left text-center">
                    <img src="https://kickoff-test.s3.ca-central-1.amazonaws.com/images/layout/FooterLogo.png" alt="Logo" id="footerLogo">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-4 text-md-right text-center">
                            <p class="footer-col"><b>Community</b></p>
                            <a href="/authors" class="footer-link">Authors</a> <br>
                            <a href="/podcasts" class="footer-link">Podcasts</a>
                        </div>
                        <div class="col-4 text-md-right text-center">
                            <a href="/sports"><p class="footer-col"><b>Sports</b></p></a>
                            <a href="/sports/baseball" class="footer-link">Baseball</a> <br>
                            <a href="/sports/basketball" class="footer-link">Basketball</a> <br>
                            <a href="/sports/football" class="footer-link">Football</a> <br>
                            <a href="/sports/hockey" class="footer-link">Hockey</a> <br>
                        </div>
                        <div class="col-4 text-md-right text-center">
                            <p><b>Company</b></p>
                            <a href="/about" class="footer-link">About Us</a> <br>
                            <a href="/about" class="footer-link">Contact</a> <br>
                        </div>
                    </div>
                </div>
            </div>
            
            <hr>
            
            <div class="row">
                <div class="col-sm-6 order-sm-1 order-12" id="copyright">
                    <div class="d-flex justify-content-md-start justify-content-center">
                        &copy; 2020 The Kickoff.
                    </div>
                </div>
                <div class="col-sm-6 order-sm-12 order-1">
                    <div class="d-flex justify-content-md-end justify-content-center">
                        <ul class="logos">
                            <li class="logo"> <a class="noline" href="mailto:thekickoffca@gmail.com"> <i class="fas fa-envelope fa-2x" id="fas-logo"></i> </a> </li>
                            <li class="logo"> <a class="noline" target="_blank" href="https://twitter.com/thekickoffca"> <i class="fab fa-twitter fa-2x" id="fas-logo"></i> </a> </li>
                            <li class="logo"> <a class="noline" target="_blank" href="https://www.instagram.com/thekickoffca/"> <i class="fab fa-instagram fa-2x" id="fas-logo"></i> </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
          
        </footer>
        
    </body>

</html>
