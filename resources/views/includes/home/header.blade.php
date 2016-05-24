<nav class="navbar" style="height:100%">
          <div class="container-fluid" style="height:100%">
              <div class="navbar-header" style="height:100%">
                  <a class="navbar-brand" href="/home/{!! $currentUser->username !!}" style="padding:0;height:100%">
                      <img class="logo" src="/img/nombre.png">
                  </a>
              </div>
              <ul class="nav navbar-nav navbar-right" style="height:100%">
                  <li style="height:100%;margin-right:0px"><a href="/logout" style="height:100%;padding-top:15%"><span class="fa fa-sign-out" style="margin:0"></span></a></li>
                  <li style="height:100%;margin-right:20px"><a href="#" style="height:100%;padding-top:15%"><span class="fa fa-plus-circle" style="margin:0"></span></a></li>
                  <li style="height:100%;margin-right:150px"><a href="#" style="height:100%;padding:0"><img src="{!! $currentUser->foto !!}"  style="height:94%;margin-top:3%;border:1px solid lightgray"/></a></li>
              </ul>
          </div>
      </nav>
<!--<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/home/{!! $currentUser->username !!}"><img class="logo" src="../img/nombre.png"/></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/logout" class="r"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
        <li><a href="collapsible.html"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
        <li><a href="mobile.html"><img class="miniFoto" src="{!! $currentUser->foto !!}"/></a></li>
      </ul>
    </div>
  </div>
</nav>
-->
