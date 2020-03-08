@extends('plantillas.plantilla')
@section('titulo')
    Agencia Rural
@endsection
@section('cabecera')
    <div class="text-center">
        <h1 class="text-center">Agencia Rural Almería City</h1>
    </div>
@endsection
@section('contenido')
    <div class="text-center mt-5">
        <a href="{{route('clientes.index')}}" class="btn btn-success mr-2">Clientes</a>
        <a href="{{route('alojamientos.index')}}" class="btn btn-warning">Alojamientos</a>
    </div>
@endsection
