<!-- CAMBIAR EL NOMBRE DE ESA CLASE -->
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
  <li><a href="/informacion">Ver perfil</a><li>
  <li><a href="/home/{!! $currentUser->username !!}">Eventos</a><li>
  <li><a href="/historial">Historial</a><li>
  <li><a href="/home/{!! $currentUser->username !!}/colabora">Eventos a Colaborar</a><li>
  </ul>
</div>
<div class="premium">
  <a href="/amigos">Adquirir Premium</a>
</div>
</div>
