<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdopcionController extends Controller
{
    public function mostrarFormulario($id)
    {
        $mascota = (object)[
            'id_mascota' => $id,
            'nombre' => 'Luna'
        ];

        return view('formulario_adopcion', compact('mascota'));
    }

    public function enviar(Request $request)
    {
        $request->validate([
            'motivo' => 'required|string|max:1000',
            'experiencia' => 'required|in:si,no',
            'pdf_formulario' => 'required|mimes:pdf|max:2048',
            'id_mascota' => 'required|integer'
        ]);

        return back()->with('success', '¡Solicitud enviada con éxito!');
    }
}