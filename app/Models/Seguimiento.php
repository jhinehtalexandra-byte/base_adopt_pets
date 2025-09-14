<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Seguimiento
 * 
 * @property int $id_seguimiento
 * @property int|null $id_adoptante
 * @property int|null $id_mascota
 * @property Carbon $fecha_seguimiento
 * @property string $tipo_seguimiento
 * @property string|null $observaciones
 * @property string|null $estado_mascota
 * @property Carbon|null $proximo_seguimiento
 * @property string|null $realizado_por
 * @property Carbon $fecha_registro
 * 
 * @property Usuario|null $usuario
 * @property Mascota|null $mascota
 *
 * @package App\Models
 */
class Seguimiento extends Model
{
	protected $table = 'seguimientos';
	protected $primaryKey = 'id_seguimiento';
	public $timestamps = false;

	protected $casts = [
		'id_adoptante' => 'int',
		'id_mascota' => 'int',
		'fecha_seguimiento' => 'datetime',
		'proximo_seguimiento' => 'datetime',
		'fecha_registro' => 'datetime'
	];

	protected $fillable = [
		'id_adoptante',
		'id_mascota',
		'fecha_seguimiento',
		'tipo_seguimiento',
		'observaciones',
		'estado_mascota',
		'proximo_seguimiento',
		'realizado_por',
		'fecha_registro'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_adoptante');
	}

	public function mascota()
	{
		return $this->belongsTo(Mascota::class, 'id_mascota');
	}
}
