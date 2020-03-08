<?php

namespace App\Http\Controllers;

use App\Alojamiento;
use App\Http\Requests\AlojamientoRequest;
use Illuminate\Http\Request;

class AlojamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alojamientos = Alojamiento::orderBy('nombre')->paginate(3);
        return view('alojamientos.index', compact('alojamientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provincias = Alojamiento::all();
        return view('alojamientos.create', compact('provincias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlojamientoRequest $request)
    {
        $datos = $request->validated();
        $alojamiento = new Alojamiento();
        $alojamiento->nombre = $datos['nombre'];
        $alojamiento->provincias = $datos['provincias'];

        if (isset($datos['foto'])) {
            $file = $datos['foto'];
            $nombre = 'alojamientos/' . time() . '_' . $file->getClientOriginalName();
            \Storage::disk('public')->put($nombre, \File::get($file));
            $alojamiento->foto = "img/$nombre";
        }

        $alojamiento->save();
        return redirect()->route('alojamientos.index')->with('mensaje', 'alojamiento creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alojamiento  $alojamiento
     * @return \Illuminate\Http\Response
     */
    public function show(Alojamiento $alojamiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alojamiento  $alojamiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Alojamiento $alojamiento)
    {
        $provincias = ['Almería', 'Cadiz', 'Córdoba', 'Granada', 'Huelva', 'Jaen', 'Málaga', 'Sevilla'];
        return view('alojamientos.edit', compact('alojamiento', 'provincias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alojamiento  $alojamiento
     * @return \Illuminate\Http\Response
     */
    public function update(AlojamientoRequest $request, Alojamiento $alojamiento)
    {
        $datos = $request->validated();
        $alojamiento->nombre = $datos['nombre'];
        $alojamiento->provincias = $datos['provincias'];

        if (isset($datos['foto'])) {
            $file = $datos['foto'];
            $nombre = 'alojamientos/' . time() . '_' . $file->getClientOriginalName();
            \Storage::disk('public')->put($nombre, \File::get($file));
            $alojamiento->foto = "img/$nombre";
        }

        if (isset($datos['foto']) && basename($datos['foto']) != 'default.jpg') {
            unlink($datos['foto']);
        }

        $alojamiento->save();
        return redirect()->route('alojamientos.index')->with('mensaje', 'alojamiento modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alojamiento  $alojamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alojamiento $alojamiento)
    {
        if (basename($alojamiento->foto) != 'default.jpg') {
            unlink($alojamiento->foto);
        }
        $alojamiento->delete();
        return redirect()->route('alojamientos.index')->with('mensaje', 'Alojamiento eliminado');
    }
}
