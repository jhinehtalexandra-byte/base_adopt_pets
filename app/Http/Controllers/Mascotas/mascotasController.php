<?php

namespace App\Http\Controllers\Mascotas;

use App\Http\Controllers\Controller;
use App\Models\Mascota;
use App\Models\Refugio; // Agregar esta importación
use Illuminate\Http\Request;
use App\Http\Requests\StoreMascotaRequest; // Agregar esta importación
use App\Http\Requests\UpdateMascotaRequest; // Agregar esta importación

class mascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mascotas = Mascota::with('refugio') // Cambiado de 'Refugio' a 'refugio'
            ->orderBy('id_mascota')
            ->get();
        return view('mascotas.masco', compact('mascotas')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mascotas.create', [
            'refugios' => Refugio::orderBy('nombre_refugio')->get(['id_refugio', 'nombre_refugio']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMascotaRequest $request)
    {
        // Preparar los datos para crear la mascota
        $data = $request->validated();
        
        // Convertir checkboxes a boolean (Laravel los recibe como string o null)
        $data['vacunado'] = $request->has('vacunado');
        $data['esterilizado'] = $request->has('esterilizado');
        $data['microchip'] = $request->has('microchip');
        
        // Establecer estado_adopcion por defecto si no se envía
        if (!isset($data['estado_adopcion'])) {
            $data['estado_adopcion'] = 'disponible';
        }

        Mascota::create($data);
        
        return redirect()->route('mascotas.index')->with('ok', 'Mascota creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mascota $mascota)
    {
        return view('mascotas.show', compact('mascota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mascota = Mascota::findOrFail($id);
        return view('mascotas.edit', [
            'mascota' => $mascota,
            'refugios' => Refugio::orderBy('nombre_refugio')->get(['id_refugio', 'nombre_refugio']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMascotaRequest $request, $id)
    {
        $mascota = Mascota::findOrFail($id);
        
        // Preparar los datos para actualizar
        $data = $request->validated();
        
        // Convertir checkboxes a boolean
        $data['vacunado'] = $request->has('vacunado');
        $data['esterilizado'] = $request->has('esterilizado');
        $data['microchip'] = $request->has('microchip');
        
        $mascota->update($data);
        
        return redirect()->route('mascotas.index')->with('ok', 'Mascota actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $mascota = Mascota::findOrFail($id);
            $mascota->delete();
            return redirect()->back()->with('ok', 'Mascota eliminada correctamente');
        } catch (\Throwable $e) {
            return redirect()->back()->withErrors('No se puede eliminar: tiene registros relacionados.');
        }
    }
}