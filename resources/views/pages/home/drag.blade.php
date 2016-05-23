@extends('layouts.evento')

@section('title-page')
<title>{!!$currentEvent->nombre!!} Distribución</title>
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
BASIC CSS AND javascript
-->
<link rel="stylesheet" href="/CSS/dragDrop.css">
<script src="https://kendo.cdn.telerik.com/2016.2.504/js/jquery.min.js"></script>
<script src="/js/interact.js"></script>
<script src="/js/drag.js"></script>

@stop

@section('content')
<div class="panel panel-default " >
  <!-- Default panel contents -->
  <div class="panel-heading pcontenido" style="color:white" id="aux">Lista de Elementos</div>


  <img class="draggable object" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAN9JREFUeNpi/P//P8NgBkwMgxyMOnDUgaMOHHXgqANHHTjqwAEGoNYMOsYDcoD4A0gblfA3IG7H5yZSHFhHRYeh42RKHUhLx4HwTyC2JNeBtHYcDD8BYglSHUgvx8HwMSBmI9aB9HYcDM8kxoGuQPx2gBz4BNktjNgyBSMjIzy9IgvToJTjhxZbKHYgu4mFnKKTAkeTrHe0qhvqDvxFCwdOBOIvUJpSvd8JaRjoXIzVDmQ3Dfk0CIuCj3RwyxdyHLgMSm+iocNWQunFRKfB0WJm1IGjDhx14KgDBw8ACDAAmlCC5/sLTbQAAAAASUVORK5CYII="></img>

</div>
<div class="panel panel-default " >
  <!-- Default panel contents -->
  <div class="panel-heading pcontenido" style="color:white">Distribución del lugar</div>
  <div id="grid" class="parent">

  <img class="draggable object" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAN9JREFUeNpi/P//P8NgBkwMgxyMOnDUgaMOHHXgqANHHTjqwAEGoNYMOsYDcoD4A0gblfA3IG7H5yZSHFhHRYeh42RKHUhLx4HwTyC2JNeBtHYcDD8BYglSHUgvx8HwMSBmI9aB9HYcDM8kxoGuQPx2gBz4BNktjNgyBSMjIzy9IgvToJTjhxZbKHYgu4mFnKKTAkeTrHe0qhvqDvxFCwdOBOIvUJpSvd8JaRjoXIzVDmQ3Dfk0CIuCj3RwyxdyHLgMSm+iocNWQunFRKfB0WJm1IGjDhx14KgDBw8ACDAAmlCC5/sLTbQAAAAASUVORK5CYII="></img>

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
