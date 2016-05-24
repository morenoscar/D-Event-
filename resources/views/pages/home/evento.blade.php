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

<div>
  <h3>Información Evento</h3>
  <p>Nombre: {!!$currentEvent->nombre!!}</p>
  <p>Tipo de Evento: {!!$currentEvent->TipoEvento_idTipoEvento!!}</p>
  <p>Descripcion: {!!$currentEvent->descripcion!!}</p>
  <p>Fecha de inicio: {!!$currentEvent->fechaInicio!!}</p>
  <p>Fecha de finalizacion: {!!$currentEvent->fechaFin!!}</p>
  <p>Hora de inicio: {!!$currentEvent->horaInicio!!}</p>
  <p>Hora de finalizacion: {!!$currentEvent->horaFin!!}</p>
  <p>Presupuesto: {!!$currentEvent->presupuesto!!}</p>
</div>

@if($tipoUsuario=='CREADOR')
<!--<a class="launch-modal" href="#" data-modal-id="modal-login">Editar evento</a>-->
<div class="">
  <button type="button" class="launch-modal" data-modal-id="modal-edit-event">Modificar Evento</button>
</div>
<div class="">
  <button type="button" class="launch-modal" data-modal-id="modal-confirm-delete">Eliminar Evento</button>
</div>

<!--
<div class="">
  {!! Form::open(['url' => '/home/{$currentUser->username}/evento/{$currentEvent->idEvento}/eliminar']) !!}
    {!! Form::hidden('idEvento', $currentEvent->idEvento) !!}
    {!! Form::button('Eliminar evento', array('type'=>'submit')) !!}
  {!! Form::close() !!}
</div> -->

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
      <h3 class="modal-title" id="modal-login-label">¿Realmente desea eliminar el evento?</h3>
    </div>
    <div class="modal-body">
      {!! Form::open(['url' => '/home/{$currentUser->username}/evento/{$currentEvent->idEvento}/eliminar']) !!}
        {!! Form::hidden('idEvento', $currentEvent->idEvento) !!}
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

<!--
EL FORMULARIO DE ACTUALIZAR EVENTO
-->
<div class="modal fade" id="modal-edit-event" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
      </button>
      <h3 class="modal-title" id="modal-login-label">Editar evento</h3>
      <p>Ingrese solo los datos que quiere cambiar:</p>
    </div>
    <div class="modal-body">
      {!! Form::open(['url' => '/home/{$currentUser->username}/evento/{$currentEvent->idEvento}']) !!}
        {!! Form::hidden('idEvento', $currentEvent->idEvento) !!}
      <div class="input-field">
        {!! Form::text('nombre', null, array('class'=>'form-control ','placeholder'=>'Nombre')) !!}
      </div>
      <div class="input-field">
        {!! Form::select('TipoEvento_idTipoEvento',(['0' => 'Tipo de evento'] + $eventTypes),null,array('class' => 'form-control')) !!}
      </div>
      <div class="input-field">
        {!! Form::textarea('descripcion', null, array('size' => '30x5', 'class' => 'form-control','placeholder'=>'Descripcion')) !!}
      </div>

      <div class="demo-section k-content">
        <input id="dateInicio" placeholder="Fecha Inicio" name="fechaInicio" style="width: 100%" />
      </div>
      <script>
      $(document).ready(function() {
        // create DatePicker from input HTML element
        $("#dateInicio").kendoDatePicker();
      });
      </script>

      <div class="input-field">
        {!! Form::text('horaInicio', null, array('class'=>'form-control ','placeholder'=>'Hora Inicio')) !!}
      </div>

      <div class="demo-section k-content">
        <input id="dateFinal" placeholder="Fecha Final" name="fechaFin" style="width: 100%" />
      </div>
      <script>
      $(document).ready(function() {
        // create DatePicker from input HTML element
        $("#dateFinal").kendoDatePicker();
      });
      </script>

      <div class="input-field">
        {!! Form::text('horaFin', null, array('class'=>'form-control ','placeholder'=>'Hora Fin')) !!}
      </div>
      <div class="input-field">
        {!! Form::text('presupuesto', null, array('class'=>'form-control ','placeholder'=>'Presupuesto')) !!}
      </div>
      <div class="input-field">
        {!! Form::select('estado',(['0' => 'Estado del evento','1' => 'Activo','2' => 'Inactivo']),null,array('class' => 'form-control','required')) !!}
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
TERMINA EL FORMULARIO DE ACUALIZAR EVENTO
-->
@endif

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
