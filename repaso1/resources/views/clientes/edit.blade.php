@extends('plantillas.plantilla')
@section('titulo')
    Clientes
@endsection
@section('cabecera')
    <h1 class="text-center">Editar cliente</h1>
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
<form action="{{route('clientes.update',$cliente)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        Nombre: <input type="text" name="nombre" value="{{$cliente->nombre}}">
        Apellidos: <input type="text" name="apellidos" value="{{$cliente->apellidos}}">
    </div>
    <div class="my-3">
        Perfil actual: <img src="{{asset($cliente->perfil)}}" width="120px" height="120px" class="rounded-circle">
        Añadir imágen: <input type="file" name="perfil" accept="image/*">
    </div>
    <div class="mt-3">
        <input type="submit" value="Editar" class="btn btn-success my-2">
        <a href="{{route('clientes.index')}}" class="btn btn-warning">Volver</a>
    </div>
</form>
@endsection
