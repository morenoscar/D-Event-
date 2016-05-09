<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/home/{!! $currentUser->username !!}"><img id="foto" src="../img/nombre.png"/></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
        <li><a href="collapsible.html"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
        <li><a href="mobile.html"><img id="foto" src="{!! $currentUser->foto !!}"/></a></li>
      </ul>
    </div>
  </div>
</nav>
