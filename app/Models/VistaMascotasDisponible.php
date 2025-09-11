<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VistaMascotasDisponible
 * 
 * @property int $id_mascota
 * @property string $nombre
 * @property string $especie
 * @property string|null $raza
 * @property int|null $edad_aproximada
 * @property string $sexo
 * @property string $tamaño
 * @property string|null $color
 * @property string $nombre_refugio
 * @property string|null $localidad
 * @property string|null $telefono_refugio
 *
 * @package App\Models
 */
class VistaMascotasDisponible extends Model
{
	protected $table = 'vista_mascotas_disponibles';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_mascota' => 'int',
		'edad_aproximada' => 'int'
	];

	protected $fillable = [
		'id_mascota',
		'nombre',
		'especie',
		'raza',
		'edad_aproximada',
		'sexo',
		'tamaño',
		'color',
		'nombre_refugio',
		'localidad',
		'telefono_refugio'
	];
}
