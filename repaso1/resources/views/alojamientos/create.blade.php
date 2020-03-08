@extends('plantillas.plantilla')
@section('titulo')
    Alojamientos
@endsection
@section('cabecera')
    <h1 class="text-center">Crear alojamientos</h1>
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
<form action="{{route('alojamientos.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    Nombre: <input type="text" name="nombre">
    <select name="provincias">
        @foreach ($provincias as $item)
            <option>{{$item}}</option>
        @endforeach
    </select>
    Añadir imágen: <input type="file" name="foto" accept="image/*">
    <div class="mt-3">
        <input type="submit" value="Añadir" class="btn btn-success my-2">
        <a href="{{route('alojamientos.index')}}" class="btn btn-warning">Volver</a>
    </div>
</form>
@endsection
