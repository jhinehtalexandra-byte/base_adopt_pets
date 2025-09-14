<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VistaAdopcionesPendiente
 * 
 * @property int $id_adopcion
 * @property string|null $adoptante
 * @property string|null $telefono
 * @property string $email
 * @property string $mascota
 * @property string $especie
 * @property Carbon $fecha_solicitud
 * @property bool|null $formulario_enviado
 * @property string $nombre_refugio
 *
 * @package App\Models
 */
class VistaAdopcionesPendiente extends Model
{
	protected $table = 'vista_adopciones_pendientes';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_adopcion' => 'int',
		'fecha_solicitud' => 'datetime',
		'formulario_enviado' => 'bool'
	];

	protected $fillable = [
		'id_adopcion',
		'adoptante',
		'telefono',
		'email',
		'mascota',
		'especie',
		'fecha_solicitud',
		'formulario_enviado',
		'nombre_refugio'
	];
}
