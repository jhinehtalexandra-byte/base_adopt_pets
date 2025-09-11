<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Refugio
 * 
 * @property int $id_refugio
 * @property string $nombre_refugio
 * @property string $direccion
 * @property string|null $telefono
 * @property string|null $email
 * @property string|null $responsable
 * @property int|null $capacidad_maxima
 * @property string|null $localidad
 * @property string|null $descripcion
 * @property bool|null $activo
 * @property Carbon $fecha_registro
 * 
 * @property Collection|Mascota[] $mascotas
 *
 * @package App\Models
 */
class Refugio extends Model
{
	protected $table = 'refugios';
	protected $primaryKey = 'id_refugio';
	public $timestamps = false;

	protected $casts = [
		'capacidad_maxima' => 'int',
		'activo' => 'bool',
		'fecha_registro' => 'datetime'
	];

	protected $fillable = [
		'nombre_refugio',
		'direccion',
		'telefono',
		'email',
		'responsable',
		'capacidad_maxima',
		'localidad',
		'descripcion',
		'activo',
		'fecha_registro'
	];

	public function mascotas()
	{
		return $this->hasMany(Mascota::class, 'id_refugio');
	}
}
