@extends('plantillas.plantilla')
@section('titulo')
    Clientes
@endsection
@section('cabecera')
    <h1 class="text-center">Lista de clientes</h1>
@endsection
@section('contenido')
@if ($text=Session::get('mensaje'))
    <p class="alert alert-primary">{{$text}}</p>
@endif
<a href="{{route('clientes.create')}}" class="btn btn-success my-3">Crear cliente</a>
<div class="float-right my-3">
    <form action="{{route('clientes.index')}}" method="get" onchange="this.form.submit()">
        <select name="nombre">
            <option value="%" selected>Todos</option>
            @foreach ($listaClientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
            @endforeach
        </select>
    </form>
</div>
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">Detalles</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Perfil</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
            <tr>
                <td class="align-middle"></td>
                <td class="align-middle">{{$cliente->nombre}}</td>
                <td class="align-middle">{{$cliente->apellidos}}</td>
                <td class="align-middle"><img src="{{asset($cliente->perfil)}}" class="rounded-circle" width="80px" height="80px"></td>
                <form action="{{route('clientes.destroy',$cliente)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <td class="align-middle">
                        <input type="submit" value="Borrar" class="btn btn-danger mx-2">
                        <a href="{{route('clientes.edit',$cliente)}}" class="btn btn-warning">Editar</a>
                    </td>
                </form>
            </tr>
        @endforeach
    </tbody>
  </table>
  {{$clientes->appends(Request::except('page'))->links()}}
@endsection
