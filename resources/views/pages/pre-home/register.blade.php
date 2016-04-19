<!--
Nombre
Correo
Fecha de Nacimiento
Username
Password
Confirmar Password
Aceptar terminos y condiciones -->

@extends('layouts.pre-home')

@section('title-page')
<title>Register</title>
@stop

@section('content')

<div class="cover">
	<div class="bloque">
		<h1>D-Event</h1>
		{!! Form::open(['url' => 'sigin']) !!}
		<div class="input-field">
			{!! Form::text('name', null, array('class'=>'form-control ','placeholder'=>'Nombre', 'required')) !!}
		</div>
		<div class="input-field">
			{!! Form::email('email_address', null , array('class'=>'form-control ', 'placeholder'=>'example@example.com', 'required')) !!}
		</div>
		<div class="input-field">
			<!-- ACA TOCA CON COMBOBOX -->
			{!! Form::text('date_birth', null, array('class'=>'form-control ', 'placeholder'=>'Date_Birth', 'required')) !!}
		</div>
		<div class="input-field">
			{!! Form::text('username', null, array('class'=>'form-control ', 'placeholder'=>'Usuario', 'required')) !!}
		</div>
		<div class="input-field">
			{!! Form::password('password', array('class'=>'form-control ', 'placeholder'=>'Contraseña', 'required')) !!}
		</div>
		<div class="input-field">
			{!! Form::password('copypassword', array('class'=>'form-control ', 'placeholder'=>'Contraseña', 'required')) !!}
		</div>
		<div>
			{!! Form::button('Registrarse', array('class'=>'btn waves-effect waves-light', 'type'=>'submit')) !!}
		</div>
		{!! Form::close() !!}
	</div>
</div>
@stop
