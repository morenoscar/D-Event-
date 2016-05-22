@extends('layouts.colaboraciones')

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
  <h3>Colaborando</h3>
  <!--<div class="input-group" id="search-bar">-->
  <form id="searchform" action="index.html" method="post">
    <input type="text" class="form-control" placeholder="Buscar" aria-describedby="basic-addon2">
    <button type="submit" name="button"><i class="fa fa-search" aria-hidden="true"></i></button>
  </form>
  <!--</div>-->
</div>

<div class="group-block">
@foreach ($colaboraciones as $evento)
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
