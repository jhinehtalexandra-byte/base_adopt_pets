<?php

namespace App\Http\Controllers\Adoptantes;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AdoptantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adoptantes = Usuario::all();
        return view('Usuarios.usuarios', compact('adoptantes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $adoptante = Usuario::findOrFail($id);
        return view('Usuarios.edit', compact('adoptante'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    // Guardar un nuevo adoptante en la base de datos
    public function store(Request $request)
    {
        // Validación de datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'email' => 'required|email|unique:adoptantes,email',
            'telefono' => 'required|string|max:20',
            'cedula' => 'required|string|max:20|unique:adoptantes,cedula',
        ]);

        // Crear adoptante
        Adoptante::create($validated + ['fecha_registro' => now()]);

        // Redireccionar a la lista de adoptantes con mensaje
        return redirect()->route('usuarios.index')
                         ->with('success', 'Adoptante registrado correctamente.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $adoptante = Usuario::findOrFail($id);

        // Validación de los campos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $id,
            // agrega otros campos según tu tabla
        ]);

        $adoptante->update($request->all());

        return redirect()->route('adoptantes.index')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $adoptante = Usuario::findOrFail($id);
        $adoptante->delete();

        return redirect()->route('adoptantes.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
