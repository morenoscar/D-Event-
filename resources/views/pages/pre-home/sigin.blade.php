@extends('layouts.pre-home1')

@section('title-page')
<title>SigIn</title>
@stop

@section('content')

<div class="cover">
	<div class="bloque">
		<h1>D-Event</h1>
			{!! Form::open(['url' => 'sigin']) !!}
			<div class="input-field">
				{!! Form::text('username', null, array('class'=>'form-control ','placeholder'=>'Username', 'required')) !!}
			</div>
			<div class="input-field">
				{!! Form::password('password', array('class'=>'form-control ','placeholder'=>'Password', 'required')) !!}
			</div>
			<div>
				{!! Form::button('Iniciar Sesion', array('class'=>'btn waves-effect waves-light', 'type'=>'submit')) !!}
			</div>
			{!! Form::close() !!}
	</div>
	<div class="bottom">
		<div class="bottomLeft">
			<a href="#">Olvide mi contraseña</a>
		</div>
		<div class="bottomRight">
			¿No tienes cuenta? <a href="/register">Registrate</a>
		</div>
	</div>
</div>


@stop
