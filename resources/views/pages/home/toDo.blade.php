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

<!--
END OF CSS AND JS OF DATE PICKER
-->
@stop

@section('content')

<div class="panel panel-default">
  <div class="panel-heading " >
    <i class="title">To-Do List</i>

  </div>
  <div class="modal-body">
    <div class="panel-body">

      <!--<a class="launch-modal" href="#" data-modal-id="modal-login">Editar evento</a>-->

      <table class="table">
        <thead>
          <tr  align="center">
            <th>Nombre</th>
            <th>Prioridad</th>
            <th>Fecha</th>
            <th>Modificar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($tarjetas as $tarjeta)
          @if ($tarjeta->prioridad=='ALTA')
          <tr class="danger"  align="center">
            @endif

            @if ($tarjeta->prioridad=='MEDIA')
            <tr class="warning"  align="center">
              @endif

              @if ($tarjeta->prioridad=='BAJA')
              <tr class="info" align="center">
                @endif
                <td> {!!$tarjeta->nombre!!}</td>
                <td> {!!$tarjeta->prioridad!!}</td>
                <td>{!!$tarjeta->fecha!!}</td>
                <td>
                  <div align="center">
                    <button type="button" class="btn launch-modal" data-modal-id="modal-edit-item" style="height:30px; background-color:#7CC9DF;"><i class="fa fa-pencil"></i></button>
                  </div>
                </td>
                <td>
                  @if($tipoUsuario=='CREADOR')
                  <div align="center">
                    <button type="button" class="btn btn-danger launch-modal" data-modal-id="modal-confirm-delete" style="height:30px; background-color:#C9302C;"><i class="fa fa-trash"></i></button>
                  </div>
                  @endif
                </td>
              </tr>
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
                  <h3 class="modal-title" id="modal-login-label">¿Realmente desea eliminar el item?</h3>
                </div>
                <div class="modal-body">
                  {!! Form::open(['url' => '/home/{$currentUser->username}/evento/{$currentEvent->idEvento}/toDo/eliminar']) !!}
                  {!! Form::hidden('idItem', $tarjeta->idItem) !!}
                  {!! Form::hidden('idEvento', $currentEvent->idEvento) !!}
                  <div align="center">
                    {!! Form::button('<i class="fa fa-check" style="color:white;" ></i><a class="butstyle">Si</a>'
                    , array('class'=>'btn waves-effect waves-light', 'type'=>'submit','style'=>'width:30%;background-color:#13F229;')) !!}
                    <button type="button" class="btn waves-effect waves-light" style="width:30%; background-color:#C9302C;"data-dismiss="modal">
                      <i class="fa fa-times" style="color:white;" ></i><a class="butstyle">No</a>
                    </button>
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
                {!! Form::text('nombre', null, array('class'=>'form-control ','placeholder'=>'Nombre de la Tarjeta','required')) !!}
              </div>
              <div class="input-field"  style="padding:10px 0px;">
                {!! Form::select('prioridad',(['0' => 'Prioridad','1' => 'Baja','2' => 'Media','3' => 'Alta']),null,array('class' => 'form-control','required')) !!}
              </div>
              <div class="demo-section k-content">
                <input id="fecha" placeholder="Fecha Recordatorio" name="fecha" style="width: 100%" />
              </div>
              <script>
              $(document).ready(function() {
                // create DatePicker from input HTML element
                $("#fecha").kendoDatePicker();
              });
              </script>
              <div class="input-field"  style="padding-top:10px;">
                {!! Form::textarea('nota', null, array('size' => '30x5', 'class' => 'form-control','placeholder'=>'Nota','required')) !!}
              </div>
              <div  style="padding-top:10px;">
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

  </tbody>
</table>
<div align="center">
  <button type="button" class="btn launch-modal" style="background-color:#7CC9DF; width:20%"  class="launch-modal" data-modal-id="modal-add-item">
    <i class="fa fa-plus" style="color:white;"></i><a class="butstyle">Añadir</a>
  </button>
</div>
</div>
</div>
</div>

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
          {!! Form::text('nombre', null, array('class'=>'form-control ','placeholder'=>'Nombre de la Tarjeta','required')) !!}
        </div>
        <div class="input-field"  style="padding:10px 0px;">
          {!! Form::select('prioridad',(['0' => 'Prioridad','1' => 'Baja','2' => 'Media','3' => 'Alta']),null,array('class' => 'form-control','required')) !!}
        </div>
        <div class="demo-section k-content">
          <input id="fechaId" placeholder="Fecha Recordatorio" name="fecha" style="width: 100%" />
        </div>
        <script>
        $(document).ready(function() {
          // create DatePicker from input HTML element
          $("#fechaId").kendoDatePicker();
        });
        </script>
        <div class="input-field"  style="padding-top:10px;">
          {!! Form::textarea('nota', null, array('size' => '30x5', 'class' => 'form-control','placeholder'=>'Nota','required')) !!}
        </div>
        <div  style="padding-top:10px;">
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
