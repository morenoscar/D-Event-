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
      @include('includes.home.sidebar')
    </div>

    <div class="main-content">
      @yield('content')
    </div>
  </div>

  <footer class="footer">
    @include('includes.footer')
  </footer>

  @yield('footer-include')

</body>
</html>
