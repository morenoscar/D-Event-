<html>
<head>
  <meta charset="UTF-8">
  <title>Drag and Drop</title>
  <!-- Mobile support -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Twitter Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">

  <!-- Material Design for Bootstrap -->
  <link href="http://localhost:8000/CSS/material-wfont.min.css" rel="stylesheet">
  <link href="http://localhost:8000/CSS/ripples.min.css" rel="stylesheet">
  <link href="http://localhost:8000/CSS/custom.css" rel="stylesheet">

  <link href="http://localhost:8000/CSS/home.css" media="all" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="http://localhost:8000/CSS/materialize.min.css" media="screen" title="no title" charset="utf-8">

  <!-- Font Awesome -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/styles/default.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/highlight.min.js"></script>

  <script type="text/javascript" src="http://localhost:8000/js/materialize.min.js"></script>

  <!-- svg.js -->
  <script src="http://localhost:8000/js/svg.js"></script>
  <script src="http://localhost:8000/js/svg.draggy.js"></script>

  <script src="http://localhost:8000/js/handlers.js"></script>
</head>
<body>
  <header>
    @include('includes.home.header')
  </header>
  <div class="content">
    <div class="sidebar">
      @include('includes.home.sidebarItemsDrag')
    </div>

    <div class="container">
      <h2>Drag and Drop</h2>
      <div class="row">
        <div class="col-lg-6">
          <div class="graph"></div>
        </div>
      </div>
      <script>
      hljs.highlightBlock(document.querySelector("pre"));
      </script>
    </div>
  </div>

  <footer class="footer">
    @include('includes.footer')
  </footer>
</body>
</html>
