@extends('layouts.pre-home')

@section('title-page')
<title>Register</title>
@stop

@section('content')

<div class="cover">
	<div class="bloque">
		<h1>D-Event</h1>
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
			<!-- ACA TOCA CON COMBOBOX -->
			{!! Form::text('fechaNacimiento', null, array('class'=>'form-control ', 'placeholder'=>'Date_Birth')) !!}
		</div>
		<div class="input-field">
			{!! Form::text('username', null, array('class'=>'form-control ', 'placeholder'=>'Usuario', 'required')) !!}
		</div>
		<div class="input-field">
			{!! Form::password('password', array('class'=>'form-control ', 'placeholder'=>'Contraseña', 'required')) !!}
		</div>
		<div class="input-field">
			<input type="password" class= "form-control" placeholder="Contraseña" name="copypassword" required>
			<!--{!! Form::password('copypassword', array('class'=>'form-control ', 'placeholder'=>'Contraseña', 'required')) !!}-->
		</div>
		<div>
			{!! Form::button('Registrarse', array('class'=>'btn waves-effect waves-light', 'type'=>'submit')) !!}
		</div>
		{!! Form::close() !!}
	</div>
</div>

@stop
