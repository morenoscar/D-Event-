@extends('layouts.home')

@section('title-page')
<title>Home - {!! $currentUser->nombre !!}</title>
@stop

@section('content')
<div class="elquequiera">
  <h3>Eventos</h3>
  <div class="input-group" id="search-bar">
    <input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon2">
    <button type="button" name="button"><span class="fa fa-search" aria-hidden="true"></span></button>
  </div>
</div>

<div class="group-block">
  <div class="block">
    <center><i class="fa fa-plus" aria-hidden="true"></i>
      <div class="name-block">
        <p>
          Crear nuevo evento
        </p>
      </div>
    </center>
  </div>
  @foreach ($currentUser->eventos as $evento)
  <div class="block">
    <div class="image-block">
       <img src="/showImage.php?id={!! $evento->idEvento !!}" />
    </div>
    <div class="bottom-block">
      <div class="name-block">
        <p>
          {!! $evento->nombre !!}
        </p>
      </div>
      <div class="button-block">
        <a class="btn" href="/home/{!! $currentUser->username !!}/evento/{!! $evento->idEvento !!}">Abrir</a>
      </div>
    </div>
  </div>
  @endforeach
</div>


@stop
