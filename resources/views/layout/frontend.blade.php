<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>
    Giftos
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.css')}}" />

  <!-- Custom styles for this template -->
  <link href="{{ asset('frontend/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('frontend/css/responsive.css')}}" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand">
          <span>
            Giftos
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/detail-category/11') }}">
                Handphone
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/detail-category/13') }}">
                Jaket
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/detail-category/14') }}">
                Topi
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/detail-category/15') }}">
                Kaos
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/detail-category/16') }}">
                Sepatu
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/detail-category/17') }}">
                Celana
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/detail-category/19') }}">
                Jersey
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
          </ul>
          <div class="user_option">
            <a href="/user">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>
            <a href="{{ url('/listcart') }}">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </a>
            <form class="form-inline ">
              <button class="btn nav_search-btn" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->
    <!-- slider section -->

    @yield('body')

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->

  

  <!-- end info section -->


  <script src="{{ asset('frontend/js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{ asset('frontend/js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{ asset('frontend/js/custom.js')}}"></script>

</body>

</html>