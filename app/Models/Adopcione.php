<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Adopcione
 * 
 * @property int $id_adopcion
 * @property int|null $id_adoptante
 * @property int|null $id_mascota
 * @property Carbon $fecha_solicitud
 * @property Carbon|null $fecha_aprobacion
 * @property string|null $estado_adopcion
 * @property string|null $url_formulario_descarga
 * @property bool|null $formulario_enviado
 * @property Carbon|null $fecha_envio_formulario
 * @property string|null $observaciones
 * @property Carbon $fecha_registro
 * 
 * @property Usuario|null $usuario
 * @property Mascota|null $mascota
 *
 * @package App\Models
 */
class Adopcione extends Model
{
	protected $table = 'adopciones';
	protected $primaryKey = 'id_adopcion';
	public $timestamps = false;

	protected $casts = [
		'id_adoptante' => 'int',
		'id_mascota' => 'int',
		'fecha_solicitud' => 'datetime',
		'fecha_aprobacion' => 'datetime',
		'formulario_enviado' => 'bool',
		'fecha_envio_formulario' => 'datetime',
		'fecha_registro' => 'datetime'
	];

	protected $fillable = [
		'id_adoptante',
		'id_mascota',
		'fecha_solicitud',
		'fecha_aprobacion',
		'estado_adopcion',
		'url_formulario_descarga',
		'formulario_enviado',
		'fecha_envio_formulario',
		'observaciones',
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
