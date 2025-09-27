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
        $mascota = $this->route('mascota');
        $id = $mascota ? $mascota->id_mascota : null;

        return [
            'nombre'            => 'required|string|max:100',
            'especie'           => 'required|in:perro,gato,conejo,ave,otro',
            'raza'              => 'nullable|string|max:100',
            'edad_aproximada'   => 'nullable|integer|min:0|max:50',
            'sexo'              => 'required|in:macho,hembra',
            'tamaño'            => 'required|in:pequeño,mediano,grande',
            'peso'              => 'nullable|numeric|min:0.1|max:999.99',
            'color'             => 'nullable|string|max:100',
            'descripcion'       => 'nullable|string|max:1000',
            'estado_salud'      => 'nullable|string|max:500',
            'vacunado'          => 'boolean',
            'esterilizado'      => 'boolean',
            // Agregar reglas de validación únicas aquí si es necesario
            // 'email' => 'unique:mascotas,email,' . $id . ',id_mascota',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'               => 'El nombre de la mascota es obligatorio.',
            'nombre.max'                    => 'El nombre no puede superar 100 caracteres.',
            'especie.required'              => 'La especie es obligatoria.',
            'especie.in'                    => 'La especie debe ser: perro, gato, conejo, ave u otro.',
            'edad_aproximada.integer'       => 'La edad debe ser un número entero.',
            'edad_aproximada.min'           => 'La edad debe ser mayor a 0.',
            'edad_aproximada.max'           => 'La edad no puede superar 50 años.',
            'sexo.required'                 => 'El sexo es obligatorio.',
            'sexo.in'                       => 'El sexo debe ser macho o hembra.',
            'tamaño.required'               => 'El tamaño es obligatorio.',
            'tamaño.in'                     => 'El tamaño debe ser pequeño, mediano o grande.',
            'peso.numeric'                  => 'El peso debe ser un número.',
            'peso.min'                      => 'El peso debe ser mayor a 0.',
            'peso.max'                      => 'El peso no puede superar 999.99 kg.',
            'descripcion.max'               => 'La descripción no puede superar 1000 caracteres.',
            'estado_salud.max'              => 'El estado de salud no puede superar 500 caracteres.',
            'fecha_ingreso.required'        => 'La fecha de ingreso es obligatoria.',
            'fecha_ingreso.date'            => 'La fecha de ingreso debe ser válida.',
            'fecha_ingreso.before_or_equal' => 'La fecha de ingreso no puede ser futura.',
            'id_refugio.required'           => 'El refugio es obligatorio.',
            'id_refugio.exists'             => 'El refugio seleccionado no es válido.',
        ];
    }
}