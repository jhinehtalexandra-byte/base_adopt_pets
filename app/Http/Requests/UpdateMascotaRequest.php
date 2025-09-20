<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMascotaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'especie' => 'required|in:perro,gato,conejo,ave,otro',
            'raza' => 'nullable|string|max:100',
            'edad_aproximada' => 'nullable|integer|min:0',
            'sexo' => 'required|in:macho,hembra',
            'tamaño' => 'required|in:pequeño,mediano,grande',
            'peso' => 'nullable|numeric|min:0|max:999.99',
            'color' => 'nullable|string|max:100',
            'descripcion' => 'nullable|string',
            'estado_salud' => 'nullable|string',
            'vacunado' => 'boolean',
            'esterilizado' => 'boolean',
            'microchip' => 'boolean',
            'estado_adopcion' => 'nullable|in:disponible,en proceso,adoptado,no disponible',
            'fecha_ingreso' => 'required|date',
            'id_refugio' => 'required|integer|exists:refugios,id_refugio',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre de la mascota es obligatorio.',
            'nombre.max' => 'El nombre no puede superar 100 caracteres.',
            'especie.required' => 'La especie es obligatoria.',
            'especie.in' => 'La especie debe ser: perro, gato, conejo, ave u otro.',
            'sexo.required' => 'El sexo es obligatorio.',
            'sexo.in' => 'El sexo debe ser macho o hembra.',
            'tamaño.required' => 'El tamaño es obligatorio.',
            'tamaño.in' => 'El tamaño debe ser pequeño, mediano o grande.',
            'peso.numeric' => 'El peso debe ser un número.',
            'peso.min' => 'El peso debe ser mayor a 0.',
            'edad_aproximada.integer' => 'La edad debe ser un número entero.',
            'edad_aproximada.min' => 'La edad debe ser mayor a 0.',
            'fecha_ingreso.required' => 'La fecha de ingreso es obligatoria.',
            'fecha_ingreso.date' => 'La fecha de ingreso debe ser válida.',
            'id_refugio.required' => 'El refugio es obligatorio.',
            'id_refugio.exists' => 'El refugio seleccionado no es válido.',
        ];
    }
}