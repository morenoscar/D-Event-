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
  <li><a href="">Informacion General</a><li>
  <li><a href="">To-Do List</a><li>
  <li><a href="">Cotizaciones</a><li>
  <li><a href="">Carrito de Compras</a><li>
  <li><a href="">Invitados</a><li>
  <li><a href="">Colaboradores</a><li>
  <li><a href="">Regalos/Aportes</a><li>
  </ul>
</div>
<div class="premium">
  <a href="/amigos">Adquirir Premium</a>
</div>
</div>
