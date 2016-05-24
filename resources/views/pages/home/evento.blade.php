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

<!--
END OF CSS AND JS OF DATE PICKER
-->
@stop

@section('content')
<!--<a class="launch-modal" href="#" data-modal-id="modal-login">Editar evento</a>-->



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
FIRST PANEL
Contain the main information of an event
-->

<div class="panel panel-default">
  <div class="panel-heading " >
    <p class="title">Información Evento</h3>
    </div>
    <div class="modal-body">
      <div class="panel-body">
        <table class="table table-hover">
          <tbody>
            <tr>
              <td>Nombre</td>
              <td>{!!$currentEvent->nombre!!}</td>
            </tr>
            <tr>
              <td>Tipo de Evento</td>
              <td>{!!$currentEvent->TipoEvento_idTipoEvento!!}</td>
            </tr>
            <tr>
              <td>Descripcion</td>
              <td>{!!$currentEvent->descripcion!!}</td>
            </tr>
            <tr>
              <td>Fecha de inicio</td>
              <td>{!!$currentEvent->fechaInicio!!}</td>
            </tr>
            <tr>
              <td>Fecha de finalizacion</td>
              <td>{!!$currentEvent->fechaFin!!}</td>
            </tr>
            <tr>
              <td>Hora de inicio</td>
              <td>{!!$currentEvent->horaInicio!!}</td>
            </tr>
            <tr>
              <td>Hora de finalizacion</td>
              <td>{!!$currentEvent->horaFin!!}</td>
            </tr>
            <tr>
              <td>Presupuesto</td>
              <td>{!!$currentEvent->presupuesto!!}</td>
            </tr>
          </tbody>
        </table>
        <div align="center">
          @if($tipoUsuario=='CREADOR')
          <div class="col-m-6" style="width:20%">
            <button type="button" class="btn btn-info launch-modal" style="background-color:#31B0D5; "  class="launch-modal" data-modal-id="modal-edit-event">
              <i class="fa fa-pencil" style="color:white;" ></i><a class="butstyle">Modificar</a>
            </button>
          </div>
          <div  class="col-m-6" style="width:20%">
            <button type="button" class="btn btn-info launch-modal" style="background-color:#C9302C; "  class="launch-modal" data-modal-id="modal-confirm-delete">
              <i class="fa fa-trash" style="color:white;"></i><a class="butstyle">Eliminar</a>
            </button>
          </div>
          @endif
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




    </div>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading " >
    <p class="title" >Estado del presupuesto</p>
  </div>
  <div class="panel-body">
    <div class="progress" style="height:30px;">
      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 55%;background-color:#C9302C">
        <a class="text-progress">55% </a>
      </div>
      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 45%;background-color:green">
        <a  class="text-progress">45% </a>      </div>
      </div>
      <div>
        <table class="table table-hover">
          <tbody>
            <tr>
              <td>Presupuesto gastado</td>
              <td>2.500</td>
            </tr>
            <tr>
              <td>Presupuesto restante</td>
              <td>30000</td>
            </tr>
          </tbody>
        </table>
        <!--Insert Shopping Car button and quotation button-->
        <div  align="center">
          <button type="button" class="btn" style="background-color: transparent;color:black;width:30%;border-style: solid;border-color:black; border-width:1px;"  >
            <i class="fa fa-shopping-cart" ></i><a style="color: black;padding-left:5px;">Carrito</a>
          </button>
          <button type="button" class="btn " style="background-color: transparent;color:black;width:30%;border-style: solid;border-color:black; border-width:1px;"  >
            <i class="fa fa-list" ></i><a style="color: black;padding-left:5px;">Cotizaciones</a>
          </button>
        </div>
      </div>
    </div>
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
