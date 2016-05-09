<!-- CAMBIAR EL NOMBRE DE ESA CLASE -->
<div class="c">
  <div>
    <img id="foto" src="{!! $currentUser->foto !!}">
    <!--<img id="foto" src="/img/profile/default.png">-->
  </div>
  <div class="userName">
    {!! $currentUser->username !!} <hr>
  </div>
</div>
<div class="list">
  <a href="/historial"><p><li>Historial</li></a>
  <a href="/eventos"><p><li>Eventos</li></a>
  <a href="/amigos"><p><li>Amigos</li></a>
</div>
<div class="list">
  <hr>
  <a href="/amigos">Adquirir Premium</a>
</div>
