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
  <li><a href="/home/{!! $currentUser->username !!}/evento/{!! $currentEvent->idEvento !!}">Informacion General</a><li>
  <li><a href="/home/{!! $currentUser->username !!}/evento/{!! $currentEvent->idEvento !!}/toDo">To-Do List</a><li>
  <li><a href="/evento/{!! $currentEvent->idEvento !!}/cotizaciones">Cotizaciones</a><li>
  <li><a href="/evento/{!! $currentEvent->idEvento !!}/carrito_compras">Carrito de Compras</a><li>
  <li><a href="/evento/{!! $currentEvent->idEvento !!}/invitados">Invitados</a><li>
  <li><a href="/home/{!! $currentUser->username !!}/evento/{!! $currentEvent->idEvento !!}/colaboradores">Colaboradores</a><li>
  <li><a href="">Regalos/Aportes</a><li>
  </ul>
</div>
<div class="premium">
  <a href="/amigos">Adquirir Premium</a>
</div>
</div>
