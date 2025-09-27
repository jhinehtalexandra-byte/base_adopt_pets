<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\Refugio;
use App\Http\Requests\StoreMascotaRequest;
use App\Http\Requests\UpdateMascotaRequest;

class MascotaController extends Controller
{
    public function index()
    {
        $mascotas = Mascota::with(['refugio'])
            ->orderBy('id_mascota')
            ->get();
        
        return view('mascotas.index', compact('mascotas'));
    }

    public function create()
    {
        return view('mascotas.create', [
            'refugios' => Refugio::orderBy('nombre_refugio')->get(['id_refugio', 'nombre_refugio']),
        ]);
    }

    public function store(StoreMascotaRequest $request)
    {
        Mascota::create($request->validated());
        
        return redirect()->route('mascotas.index')->with('ok', 'Mascota creada');
    }

    public function show(Mascota $mascota)
    {
        $mascota->load('refugio');
        return view('mascotas.show', compact('mascota'));
    }

    public function edit(Mascota $mascota)
    {
        return view('mascotas.edit', [
            'mascota'  => $mascota,
            'refugios' => Refugio::orderBy('nombre_refugio')->get(['id_refugio', 'nombre_refugio']),
        ]);
    }

    public function update(UpdateMascotaRequest $request, Mascota $mascota)
    {
        $mascota->update($request->validated());
        
        return redirect()->route('mascotas.index')->with('ok', 'Mascota actualizada');
    }

    public function destroy(Mascota $mascota)
    {
        try {
            $mascota->delete();
            return back()->with('ok', 'Mascota eliminada');
        } catch (\Throwable $e) {
            // Suele fallar si hay FKs (p.ej. adopciones) sin cascade
            return back()->withErrors('No se puede eliminar: tiene registros relacionados.');
        }
    }
}