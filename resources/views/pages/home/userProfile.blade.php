@extends('layouts.home')

@section('title-page')
<title>Home - {!! $currentUser->nombre !!}</title>
@stop

@section('header-include')
<!--
BEGIN OF CSS OF MODAL FORM
-->
<link rel="stylesheet" href="../CSS/modalAssets/bootstrap.min.css">
<link rel="stylesheet" href="../CSS/modalAssets/form-elements.css">
<link rel="stylesheet" href="../CSS/modalAssets/style.css">
<!--
END OF CSS OF MODAL FORM
-->

<!--
BEGIN OF CSS AND JS OF DATE PICKER
-->
<link rel="stylesheet" href="https://kendo.cdn.telerik.com/2016.2.504/styles/kendo.common-material.min.css" />
<link rel="stylesheet" href="https://kendo.cdn.telerik.com/2016.2.504/styles/kendo.material.min.css" />
<script src="https://kendo.cdn.telerik.com/2016.2.504/js/jquery.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2016.2.504/js/kendo.all.min.js"></script>
<!--
END OF CSS AND JS OF DATE PICKER
-->
@stop


@section('content')
<p>
	Usuario: {!! $currentUser->username !!}
</p>
<p>
	Nombre: {!! $currentUser->nombre !!}
</p>
<p>
	Apellido: {!! $currentUser->apellido !!}
</p>
<p>
	Correo: {!! $currentUser->correo !!}
</p>
<p>
	Foto: {!! $currentUser->foto !!}
</p>
<center><a class="launch-modal" href="#" data-modal-id="modal-login">Modificar</a></center>
{!! Form::open(array('url' => '/informacion/eliminar')) !!}
	<div>
		{!! Form::button('Eliminar', array('class'=>'btn waves-effect waves-light', 'type'=>'submit')) !!}
	</div>
{!! Form::close() !!}









<!--
EL FORMULARIO DE MODIFICAR USUARIO
-->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h3 class="modal-title" id="modal-login-label">Modificar informacion</h3>
				<p>Por favor ingrese los datos para modificar:</p>
			</div>

			<div class="modal-body">
				{!! Form::open(array('url' => '/informacion', 'files' => true)) !!}
				<div class="input-field">
					{!! Form::text('nombre', null, array('class'=>'form-control ','placeholder'=>'Nombre')) !!}
				</div>
				<div class="input-field">
					{!! Form::text('apellido', null, array('class'=>'form-control ','placeholder'=>'Apellido')) !!}
				</div>
				<div class="input-field">
					{!! Form::email('correo', null , array('class'=>'form-control ', 'placeholder'=>'example@example.com')) !!}
				</div>
				<div class="input-field">
					{!! Form::text('username', null, array('class'=>'form-control ', 'placeholder'=>'Usuario')) !!}
				</div>
				<div class="input-field">
					{!! Form::password('password', array('class'=>'form-control ', 'placeholder'=>'Contraseña')) !!}
				</div>
				<div class="input-field">
					{!!Form::password('copypassword', array('class'=>'form-control ', 'placeholder'=>'Contraseña')) !!}
				</div>
				<div class="">
					<!--<input type="file" name="pic" accept="image/*">-->
					{!! Form::file('foto', ['class' => 'field']) !!}
				</div>
				<div>
					{!! Form::button('Modificar', array('class'=>'btn waves-effect waves-light', 'type'=>'submit')) !!}
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
</div>
<!--
TERMINA EL FORMULARIO DE MODIFICAR USUARIO
-->

@stop

@section('footer-include')
<script src="../js/modalAssets/bootstrap.min.js"></script>
<script src="../js/modalAssets/jquery.backstretch.min.js"></script>
<script src="../js/modalAssets/scripts.js"></script>
@stop
