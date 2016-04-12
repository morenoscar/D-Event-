<!doctype html>
<html>
<head>
    @include('includes.headBootstrap')
    @yield('title-page')
</head>
<body>

    <header class="row">
        @include('includes.header')
    </header>

    <div id="main" class="row">
            @yield('content')
    </div>

    <footer class="row">
        @include('includes.footer')
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.js"></script>

</body>
</html>
