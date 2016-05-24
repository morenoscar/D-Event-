<div class="sbPrincipalContainer">

<div class="sbSecondContainer">
  <div>
    <img id="foto" src="{!! $currentUser->foto !!}">
  </div>
  <div class="userName">
    {!! $currentUser->username !!}
  </div>
</div>
<div class="list">
  <ul>
  @foreach ($categorias as $categoria)
  <li><a href="/evento/{!! $currentEvent->idEvento !!}/proveedores/{!! $categoria->idCategoria !!}">{!!$categoria->nombre!!}</a><li>
  @endforeach
  </ul>
</div>
</div>
