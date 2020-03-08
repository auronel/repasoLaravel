@extends('plantillas.plantilla')
@section('titulo')
    Alojamientos
@endsection
@section('cabecera')
    <h1 class="text-center">Editar alojamiento</h1>
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
<form action="{{route('alojamientos.update',$alojamiento)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        Nombre: <input type="text" name="nombre" value="{{$alojamiento->nombre}}">
        <select name="provincias">
            @foreach ($provincias as $item)
                <option>{{$item}}</option>
            @endforeach
        </select>
    </div>
    <div class="my-3">
        Foto actual: <img src="{{asset($alojamiento->foto)}}" width="120px" height="120px" class="rounded-circle">
        Añadir imágen: <input type="file" name="foto" accept="image/*">
    </div>
    <div class="mt-3">
        <input type="submit" value="Editar" class="btn btn-success my-2">
        <a href="{{route('alojamientos.index')}}" class="btn btn-warning">Volver</a>
    </div>
    <input type="hidden" name="provincia_id" value="{{$alojamiento->id}}">
</form>
@endsection
