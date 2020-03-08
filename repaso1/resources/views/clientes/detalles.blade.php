@extends('plantillas.plantilla')
@section('titulo')
    Clientes
@endsection
@section('cabecera')
    <h1 class="text-center">Detalles del cliente</h1>
@endsection
@section('contenido')
<div class="card mx-auto" style="width: 18rem;">
    <img src="{{asset($cliente->perfil)}}" class="card-img-top">
    <div class="card-body">
      <h5 class="card-title">
          {{$cliente->nombre}} <br>
          {{$cliente->apellidos}}
        </h5>
      <p class="card-text"></p>
      <a href="{{route('clientes.index')}}" class="btn btn-primary">Volver</a>
    </div>
  </div>
@endsection
