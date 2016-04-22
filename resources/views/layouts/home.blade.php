<!doctype html>
<html>
<head>
  @include('includes.home.head')
  @yield('title-page')
</head>
<header>
  @include('includes.home.header')
</header>
<body>

  <div class="content">
    <div class="sidebar">
      @include('includes.home.sidebar')
    </div>

    <div class="main-content">
      @yield('content')
    </div>
  </div>

  <footer class="footer">
    @include('includes.footer')
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.js"></script>

</body>
</html>
