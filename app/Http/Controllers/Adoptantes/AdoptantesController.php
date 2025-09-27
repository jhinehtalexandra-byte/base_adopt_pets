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
