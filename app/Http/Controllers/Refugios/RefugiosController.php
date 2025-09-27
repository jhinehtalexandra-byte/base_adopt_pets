<?php

namespace App\Http\Controllers\Refugios;

use App\Http\Controllers\Controller;
use App\Models\Refugio;
use Illuminate\Http\Request;

class RefugiosController extends Controller
{
    public function index()
    {
        $refugios = Refugio::all();
        return view('Refugios.refugios-admin', compact('refugios'));
    }

    public function create()
    {
        $refugio=new Refugio();
        return view('Refugios.create'); // Ajusta si tienes carpeta/refugio-admin/create
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
        ]);

        Refugio::create($request->only('nombre','direccion','correo'));

        $refugios = Refugio::all();
        return view('Refugios.refugios-admin', compact('refugios'))
               ->with('success', 'Refugio creado correctamente.');
    }

    public function edit(Refugio $refugio)
    {
        return view('Refugios.edit', compact('refugio'));
    }

    public function update(Request $request, Refugio $refugio)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
        ]);

        $refugio->update($request->only('nombre','direccion','correo'));

        $refugios = Refugio::all();
        return redirect()->route('refugios-admin.index')
        ->with('success', 'Refugio actualizado correctamente.');
    }

    public function destroy(Refugio $refugio)
    {
        $refugio->delete();

        $refugios = Refugio::all();
        return view('Refugios.refugios-admin', compact('refugios'))
               ->with('success', 'Refugio eliminado correctamente.');
    }
}