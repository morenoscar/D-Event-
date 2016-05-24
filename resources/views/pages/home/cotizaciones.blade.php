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
<div class="">
  <h1>Cotizaciones</h1>
  <a href="/evento/{!!$currentEvent->idEvento!!}/proveedores/{!!1 !!}"> Añadir proveedor</a>
</div>
@foreach ($categorias as $categoria)
<p>{!!$categoria->nombre!!}</p>
 @foreach (($categoria->misProveedores($categoria->idCategoria)) as $proveedor)
 <p> {!! $proveedor->nombre !!} </p>
 <div class="">
   {!! Form::open(['url' => '/evento/{$currentEvent->idEvento}/carrito_compras/{$categoria->idCategoria}/agregar']) !!}
     {!! Form::hidden('idEvento', $currentEvent->idEvento) !!}
     {!! Form::hidden('idProveedor', $proveedor->idProveedor) !!}
     {!! Form::hidden('idCategoria', $categoria->idCategoria) !!}
     {!! Form::button('Agregar', array('class'=>'btn waves-effect waves-light', 'type'=>'submit')) !!}
   {!! Form::close() !!}
 </div>
<div class="">
		<button type="button" class="launch-modal" data-modal-id="modal-confirm-delete"> X </button>
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
      <h3 class="modal-title" id="modal-login-label">¿Realmente desea eliminar al proveedor?</h3>
    </div>
    <div class="modal-body">
      {!! Form::open(['url' => '/evento/{$currentEvent->idEvento}/cotizaciones/eliminar']) !!}
        {!! Form::hidden('idEvento', $currentEvent->idEvento) !!}
        {!! Form::hidden('idProveedor', $proveedor->idProveedor) !!}
        {!! Form::hidden('idCategoria', $categoria->idCategoria) !!}
      <div>
        {!! Form::button('Si', array('class'=>'btn waves-effect waves-light', 'type'=>'submit')) !!}
        <button type="button" class="btn waves-effect waves-light" data-dismiss="modal">No</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
</div>
@endforeach
<!--
TERMINA LA FORMA DE CONFIRMAR ELIMINACION
-->
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
