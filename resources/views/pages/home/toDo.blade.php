@extends('layouts.evento')

@section('title-page')
<title>{!!$currentEvent->nombre!!} - ToDo List</title>
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
  <h3>ToDo List</h3>
</div>
<!--<a class="launch-modal" href="#" data-modal-id="modal-login">Editar evento</a>-->

<div class="">
  <button type="button" class="launch-modal" data-modal-id="modal-add-item">Añadir Item</button>
</div>
@foreach ($tarjetas as $tarjeta)
<div>
    <p>{!!$tarjeta->nota!!} [{!!$tarjeta->fecha!!}]</p>
    <div class="">
      <button type="button" class="launch-modal" data-modal-id="modal-edit-item">Modificar Item</button>
    </div>

    @if($tipoUsuario=='CREADOR')
    <div class="">
      {!! Form::open(['url' => '/home/{$currentUser->username}/evento/{$currentEvent->idEvento}/toDo/eliminar']) !!}
        {!! Form::hidden('idItem', $tarjeta->idItem) !!}
        {!! Form::hidden('idEvento', $currentEvent->idEvento) !!}
        {!! Form::button('Eliminar tarjeta', array('type'=>'submit')) !!}
      {!! Form::close() !!}
    </div>
    @endif
</div>


<!--
EL FORMULARIO DE MODIFICAR ITEM DE LA LISTA TO DO
-->
<div class="modal fade" id="modal-edit-item" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" id="modal-login-label">Modificar Item</h3>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/home/{$currentUser->username}/evento/{$currentEvent->idEvento}/toDo/modificar']) !!}
        {!! Form::hidden('idEvento', $currentEvent->idEvento) !!}
        {!! Form::hidden('idItem', $tarjeta->idItem) !!}
        <div class="input-field">
          {!! Form::textarea('nota', null, array('size' => '30x5', 'class' => 'form-control','placeholder'=>'Nota','required')) !!}
        </div>
        <div class="demo-section k-content">
          <input id="fechaIdMod" placeholder="Fecha" name="fecha" style="width: 100%" />
        </div>
        <script>
        $(document).ready(function() {
          // create DatePicker from input HTML element
          $("#fechaIdMod").kendoDatePicker();
        });
        </script>
        <div>
          {!! Form::button('Aceptar', array('class'=>'btn waves-effect waves-light', 'type'=>'submit')) !!}
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
<!--
TERMINA EL FORMULARIO DE MODIFICAR ITEM
-->
@endforeach
<!--
EL FORMULARIO DE AÑADIR ITEM A LA LISTA TO DO
-->
<div class="modal fade" id="modal-add-item" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" id="modal-login-label">Añadir Item</h3>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/home/{$currentUser->username}/evento/{$currentEvent->idEvento}/toDo/añadir']) !!}
        {!! Form::hidden('idEvento', $currentEvent->idEvento) !!}
        <div class="input-field">
          {!! Form::textarea('nota', null, array('size' => '30x5', 'class' => 'form-control','placeholder'=>'Nota','required')) !!}
        </div>
        <div class="demo-section k-content">
          <input id="fechaId" placeholder="Fecha" name="fecha" style="width: 100%" />
        </div>
        <script>
        $(document).ready(function() {
          // create DatePicker from input HTML element
          $("#fechaId").kendoDatePicker();
        });
        </script>
        <div>
          {!! Form::button('Aceptar', array('class'=>'btn waves-effect waves-light', 'type'=>'submit')) !!}
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
<!--
TERMINA EL FORMULARIO DE AÑADIR ITEM
-->
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
