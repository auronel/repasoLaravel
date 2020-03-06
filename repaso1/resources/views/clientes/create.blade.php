@extends('plantillas.plantilla')
@section('titulo')
    Clientes
@endsection
@section('cabecera')
    <h1 class="text-center">Crear clientes</h1>
@endsection
@section('contenido')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('clientes.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    Nombre: <input type="text" name="nombre">
    Apellidos: <input type="text" name="apellidos">
    Añadir imágen: <input type="file" name="perfil" accept="image/*">
    <div class="mt-3">
        <input type="submit" value="Añadir" class="btn btn-success my-2">
        <a href="{{route('clientes.index')}}" class="btn btn-warning">Volver</a>
    </div>
</form>
@endsection
