@extends('layouts.evento')

@section('title-page')
<title>{!!$currentEvent->nombre!!}</title>
@stop
@section('header-include')
<!--
BEGIN OF CSS OF MODAL FORM
-->
<link rel="stylesheet" href="/CSS/modalAssets/bootstrap.min.css">
<link rel="stylesheet" href="/CSS/modalAssets/form-elements.css">
<link rel="stylesheet" href="/CSS/modalAssets/style.css">
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
<div class="contentHeader">
  <h3>Invitados</h3>
  {!! Form::open(['url' => '/evento/{ $currentEvent->idEvento }/invitados/busqueda', 'id' => 'searchform']) !!}
		{!! Form::hidden('idEvento', $currentEvent->idEvento) !!}
    {!! Form::text('query', null, array('class'=>'form-control ','placeholder'=>'Buscar')) !!}
    {!! Form::button('<i class="fa fa-search" aria-hidden="true"></i>', array('class'=>'btn waves-effect waves-light', 'type'=>'submit')) !!}
  {!! Form::close() !!}
</div>

<div class="">
	<button type="button" class="launch-modal" data-modal-id="modal-add-guest">Agregar Invitado</button>
</div>
<div class="">
  <a href="/evento/{!! $currentEvent->idEvento !!}/drag">Ubicar Invitado</a>
</div>

<!--
EL FORMULARIO DE ENVIAR INVITACION A UN EVENTO
-->
<div class="modal fade" id="modal-add-guest" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h3 class="modal-title" id="modal-login-label">Agregar invitado</h3>
				<p>Ingrese el correo de la persona que va a invitar:</p>
			</div>
			<div class="modal-body">
				{!! Form::open(['url' => '/evento/{$currentEvent->idEvento}/invitados']) !!}
				{!! Form::hidden('idEvento', $currentEvent->idEvento) !!}
				<div class="input-field">
					{!! Form::text('nombre', null, array('class'=>'form-control ','placeholder'=>'Nombre')) !!}
				</div>
				<div class="input-field">
					{!! Form::text('correo', null, array('class'=>'form-control ','placeholder'=>'Correo')) !!}
				</div>
				<div>
					{!! Form::button('Aceptar', array('class'=>'btn waves-effect waves-light', 'type'=>'submit')) !!}
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
<!--
TERMINA EL FORMULARIO DE ENVIAR INVITACION A UN EVENTO
-->


@foreach ($invitados as $invitado)
<p>{!!$invitado->nombre!!}</p>
<p>{!!$invitado->correo!!}</p>
@if($tipoUsuario=='CREADOR')
<div class="">
	<div class="">
		<button type="button" class="launch-modal" data-modal-id="modal-confirm-delete">Eliminar Invitado</button>
	</div>
</div>
<!--
FORMA CONFIRMAR ELIMINACION
-->
<div class="modal fade" id="modal-confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
      </button>
      <h3 class="modal-title" id="modal-login-label">¿Realmente desea eliminar al invitado?</h3>
    </div>
    <div class="modal-body">
      {!! Form::open(['url' => '/evento/{$currentEvent->idEvento}/invitados/eliminar']) !!}
        {!! Form::hidden('idEvento', $currentEvent->idEvento) !!}
				{!! Form::hidden('idInvitado', $invitado->idInvitado) !!}
      <div>
        {!! Form::button('Si', array('class'=>'btn waves-effect waves-light', 'type'=>'submit')) !!}
        <button type="button" class="btn waves-effect waves-light" data-dismiss="modal">No</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
</div>
<!--
TERMINA LA FORMA DE CONFIRMAR ELIMINACION
-->

@endif
@endforeach







@stop

@section('footer-include')
<script src="/js/modalAssets/bootstrap.min.js"></script>
<script src="/js/modalAssets/jquery.backstretch.min.js"></script>
<script src="/js/modalAssets/scripts.js"></script>
@stop


<script type="text/javascript">
var errors = "";
@if (count($errors) > 0)

@foreach ($errors->all() as $error)
errors = errors + '{{ $error }}\n';
@endforeach
@endif

if (errors != "")
{
	alert(errors);
}
</script>
