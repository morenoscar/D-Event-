@extends('layouts.home')

@section('title-page')
<title>Home - {!! $currentUser->nombre !!}</title>
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
  <h3>Mis Eventos</h3>
  {!! Form::open(['url' => '/home/{ $currentUser->nombre }/busqueda', 'id' => 'searchform']) !!}
    {!! Form::text('query', null, array('class'=>'form-control ','placeholder'=>'Buscar')) !!}
    {!! Form::button('<i class="fa fa-search" aria-hidden="true"></i>', array('class'=>'btn waves-effect waves-light', 'type'=>'submit')) !!}
  {!! Form::close() !!}
  <!--</div>-->
</div>

<div class="group-block">
  <div class="block creatorBlock">
    <center><a class="launch-modal" href="#" data-modal-id="modal-login"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
      <div class="newEvent">
        <p>
          Crear nuevo evento
        </p>
      </div>
    </center>
  </div>

<!--
  EL FORMULARIO DE CREAR EVENTO
-->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h3 class="modal-title" id="modal-login-label">Crear Evento</h3>
        <p>Por favor ingrese los siguientes datos:</p>
      </div>

      <div class="modal-body">
        {!! Form::open(['url' => '/home/{{ $currentUser->nombre }}', 'id' => 'averquepasa']) !!}
        <div class="input-field">
          {!! Form::text('nombre', null, array('class'=>'form-control ','placeholder'=>'Nombre', 'required')) !!}
        </div>
        <div class="input-field">
          {!! Form::select('TipoEvento_idTipoEvento',(['0' => 'Tipo de evento'] + $eventTypes),null,array('class' => 'form-control')) !!}
        </div>
        <!--
        <div class="input-field">
          {!! Form::text('TipoEvento_idTipoEvento', null, array('class'=>'form-control ','placeholder'=>'Tipo Evento', 'required')) !!}
        </div>-->
        <div class="input-field">
          {!! Form::textarea('descripcion', null, array('size' => '30x5', 'class' => 'form-control','placeholder'=>'Descripcion','required')) !!}
        </div>
        <div class="demo-section k-content">
          <input id="dateInicio" placeholder="Fecha Inicio" name="fechaInicio" style="width: 100%" required/>
        </div>
        <script>
        $(document).ready(function() {
          // create DatePicker from input HTML element
          $("#dateInicio").kendoDatePicker();
        });
        </script>
        <div class="input-field">
          {!! Form::text('horaInicio', null, array('class'=>'form-control ','placeholder'=>'Hora Inicio', 'required')) !!}
        </div>
        <div class="demo-section k-content">
          <input id="dateFinal" placeholder="Fecha Final" name="fechaFin" style="width: 100%" required/>
        </div>
        <script>
        $(document).ready(function() {
          // create DatePicker from input HTML element
          $("#dateFinal").kendoDatePicker();
        });
        </script>
        <div class="input-field">
          {!! Form::text('horaFin', null, array('class'=>'form-control ','placeholder'=>'Hora Fin', 'required')) !!}
        </div>
        <div class="input-field">
          {!! Form::text('presupuesto', null, array('class'=>'form-control ','placeholder'=>'Presupuesto', 'required')) !!}
        </div>
        <div>
          {!! Form::button('Registrarse', array('class'=>'btn waves-effect waves-light', 'type'=>'submit')) !!}
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
<!--
TERMINA EL FORMULARIO DE CREAR EVENTO
-->

<!--
@if (count($errors) > 0)
<div class="error">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
-->

@foreach ($misEventos as $evento)
<div class="block">
  <div class="image-block">
    <img src="{!! $evento->foto !!}"/>
  </div>
  <div class="bottom-block">
    <div class="name-block">
      <p>
        {!! $evento->nombre !!}
      </p>
    </div>
    <div class="button-block">
      <a class="button" href="/home/{!! $currentUser->username !!}/evento/{!! $evento->idEvento !!}">Abrir</a>
    </div>
  </div>
</div>
@endforeach
</div>
@stop

@section('footer-include')
<script src="../js/modalAssets/bootstrap.min.js"></script>
<script src="../js/modalAssets/jquery.backstretch.min.js"></script>
<script src="../js/modalAssets/scripts.js"></script>
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
  alert("Algo salio mal:\n" + errors);
}
</script>
