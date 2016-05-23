@extends('layouts.pre-home')

@section('title-page')
<title>Register</title>
@stop

@section('content')
<div class="main-contentRS" style="padding-top:5%;">
	<div class="cover">
		<div class="bloque">
			<img class="imglogo" src="../img/logo.gif"><img>
			<h1 style="font-family:FontD-Event; margin:0;">Registro</h1>
			{!! Form::open(['url' => 'register']) !!}
			<div class="input-field">
				{!! Form::text('nombre', null, array('class'=>'form-control ','placeholder'=>'Nombre', 'required')) !!}
			</div>
			<div class="input-field">
				{!! Form::text('apellido', null, array('class'=>'form-control ','placeholder'=>'Apellido', 'required')) !!}
			</div>
			<div class="input-field">
				{!! Form::email('correo', null , array('class'=>'form-control ', 'placeholder'=>'example@example.com', 'required')) !!}
			</div>
		<div class="input-field">
			{!! Form::text('username', null, array('class'=>'form-control ', 'placeholder'=>'Usuario', 'required')) !!}
		</div>
		<div class="input-field">
			{!! Form::password('password', array('class'=>'form-control ', 'placeholder'=>'Contraseña', 'required')) !!}
		</div>
		<div class="input-field">

			{!!Form::password('copypassword', array('class'=>'form-control ', 'placeholder'=>'Repita la contraseña', 'required')) !!}

		</div>
		<div>
			{!! Form::button('Registrarse', array('class'=>'btn waves-effect waves-light', 'type'=>'submit')) !!}
		</div>
		@if (count($errors) > 0)
		<div class="error">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		{!! Form::close() !!}
	</div>
</div>
</div>
@stop
