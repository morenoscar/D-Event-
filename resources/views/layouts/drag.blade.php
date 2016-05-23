<!doctype html>
<html>
<head>
  @include('includes.home.head')
  @yield('title-page')
  @yield('header-include')
</head>
<header>
  @include('includes.home.header')
</header>
<body>

  <div class="content">
    <div class="sidebar">
      @include('includes.event.sidebar')
    </div>

    <div class="main-content">
      @yield('content')
    </div>
  </div>

  <footer class="footer">
    @include('includes.footer')
  </footer>

  @yield('footer-include')

<!--
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.js"></script>
-->
</body>
</html>
