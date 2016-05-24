@extends('layouts.proveedores')

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
  <h1>Proveedores</h1>
</div>

<p>{!!$currentCategoria->nombre!!}</p>
 @foreach (($currentCategoria->proveedores($currentCategoria->idCategoria)) as $proveedor)
 <p> {!! $proveedor->nombre !!} </p>
  {!! Form::open(['url' => '/evento/{$currentEvent->idEvento}/proveedores/{$currentCategoria->idCategoria}/agregar']) !!}
    {!! Form::hidden('idEvento', $currentEvent->idEvento) !!}
    {!! Form::hidden('idProveedor', $proveedor->idProveedor) !!}
    {!! Form::hidden('idCategoria', $currentCategoria->idCategoria) !!}
    {!! Form::button('Agregar', array('class'=>'btn waves-effect waves-light', 'type'=>'submit')) !!}
  {!! Form::close() !!}
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
