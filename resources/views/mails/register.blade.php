<h1>Bienvenid@ {{$data['nombre']}}</h1>

<!--<a href="{{url('/')}}/auth/confirm/email/{{$data['correo']}}/confirm_token/{{$data['token']}}">Confirmar mi cuenta</a>-->
<a href="{{url('/')}}/evento/{{$data['evento']}}/invitado/{{$data['correo']}}">Confirmar mi cuenta</a>
