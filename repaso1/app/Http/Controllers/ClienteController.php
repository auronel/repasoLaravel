<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaClientes = Cliente::all();
        $clientes = Cliente::orderBy('nombre')->paginate(5);
        return view('clientes.index', compact('clientes', 'listaClientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $datos = $request->validated();
        $cliente = new Cliente();
        $cliente->nombre = $datos['nombre'];
        $cliente->apellidos = $datos['apellidos'];

        if (isset($datos['perfil'])) {
            $file = $datos['perfil'];
            $nombre = 'clientes/' . time() . '_' . $file->getClientOriginalName();
            \Storage::disk('public')->put($nombre, \File::get($file));
            $cliente->perfil = "img/$nombre";
        }

        $cliente->save();
        return redirect()->route('clientes.index')->with('mensaje', 'Cliente moroso creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $datos = $request->validated();
        $cliente->nombre = $datos['nombre'];
        $cliente->apellidos = $datos['apellidos'];

        if (isset($datos['perfil']) && $datos['perfil'] != 'default.jpg') {
            $file = $datos['perfil'];
            $nombre = 'clientes/' . time() . '_' . $file->getClientOriginalName();
            \Storage::disk('public')->put($nombre, \File::get($file));
            $cliente->perfil = "img/$nombre";
        }

        $cliente->update();
        return redirect()->route('clientes.index')->with('mensaje', 'Subnormal modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $perfil = $cliente->perfil;

        if (basename($perfil) != 'default.jpg') {
            unlink($perfil);
        }

        $cliente->delete();
        return redirect()->route('clientes.index')->with('mensaje', 'Un subnormal menos');
    }
}
