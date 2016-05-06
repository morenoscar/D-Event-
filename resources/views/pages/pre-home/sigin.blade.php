@extends('layouts.pre-home')

@section('title-page')
<title>SigIn</title>
@stop

@section('content')
<div class="main-contentRS">
	<div class="cover" >
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
			@if ($errors->has('password'))
			<div class="alert alert-danger error">
				<ul>
					@foreach($errors->get('password') as $error )
					<li>{{ $error }}</br></li>
					@endforeach
				</ul>
			</div>
			@endif
			{!! Form::close() !!}
		</div>
		<div class="bottom">
			<div class="bottomLeft">
				<a href="#">Olvide mi contraseña</a>
			</div>
			<div class="bottomRight">
				¿No tienes cuenta? <a href="./register">Registrate</a>
			</div>
		</div>
	</div>
</div>
@stop
