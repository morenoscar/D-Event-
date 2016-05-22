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
  <h3>Colaboradores</h3>
</div>
<!--<a class="launch-modal" href="#" data-modal-id="modal-login">Editar evento</a>-->

<div class="">
  <button type="button" class="launch-modal" data-modal-id="modal-add-coll">Añadir Colaborador</button>
</div>

<div>
  @foreach ($colaboradores as $colaborador)
    <p>{!!$colaborador->username!!}</p>
    <div class="">
      {!! Form::open(['url' => '/home/{$currentUser->username}/evento/{$currentEvent->idEvento}/colaboradores/eliminar']) !!}
        {!! Form::hidden('idEvento', $currentEvent->idEvento) !!}
        {!! Form::hidden('username', $colaborador->username) !!}
        {!! Form::button('Eliminar colaborador', array('type'=>'submit')) !!}
      {!! Form::close() !!}
    </div>
  @endforeach
</div>
<!--
EL FORMULARIO DE AÑADIR COLABORADOR
-->
<div class="modal fade" id="modal-add-coll" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
      </button>
      <h3 class="modal-title" id="modal-login-label">Añadir Colaborador</h3>
    </div>
    <div class="modal-body">
      {!! Form::open(['url' => '/home/{$currentUser->username}/evento/{$currentEvent->idEvento}/colaboradores/añadir']) !!}
        {!! Form::hidden('idEvento', $currentEvent->idEvento) !!}
      <div class="input-field">
        {!! Form::email('correo', null, array('class'=>'form-control ','placeholder'=>'Correo Electrónico','required')) !!}
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
TERMINA EL FORMULARIO DE AÑADIR COLABORADOR
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
