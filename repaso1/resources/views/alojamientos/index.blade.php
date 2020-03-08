@extends('plantillas.plantilla')
@section('titulo')
    Alojamientos
@endsection
@section('cabecera')
    <h1 class="text-center">Lista de alojamientos</h1>
@endsection
@section('contenido')
@if ($text=Session::get('mensaje'))
    <p class="alert alert-primary">{{$text}}</p>
@endif
<a href="{{route('alojamientos.create')}}" class="btn btn-success my-3">Crear alojamiento</a>
<table class="table table-striped table-dark text-center">
    <thead>
      <tr>
        <th scope="col">Detalles</th>
        <th scope="col">Nombre</th>
        <th scope="col">Provincias</th>
        <th scope="col">Foto</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($alojamientos as $alojamiento)
            <tr>
                <td class="align-middle"><a href="{{route('alojamientos.show',$alojamiento)}}" class="btn btn-primary">Detalles</a></td>
                <td class="align-middle">{{$alojamiento->nombre}}</td>
                <td class="align-middle">{{$alojamiento->provincias}}</td>
                <td class="align-middle"><img src="{{asset($alojamiento->foto)}}" class="rounded-circle" width="80px" height="80px"></td>
                <form action="{{route('alojamientos.destroy',$alojamiento)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <td class="align-middle">
                        <input type="submit" value="Borrar" class="btn btn-danger mx-2">
                        <a href="{{route('alojamientos.edit',$alojamiento)}}" class="btn btn-warning">Editar</a>
                    </td>
                </form>
            </tr>
        @endforeach
    </tbody>
  </table>
  {{$alojamientos->appends(Request::except('page'))->links()}}
@endsection
