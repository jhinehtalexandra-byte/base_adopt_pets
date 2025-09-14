<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GaleriaFoto
 * 
 * @property int $id_foto
 * @property int|null $id_mascota
 * @property string $url_foto
 * @property string|null $descripcion
 * @property bool|null $es_principal
 * @property Carbon $fecha_subida
 * 
 * @property Mascota|null $mascota
 *
 * @package App\Models
 */
class GaleriaFoto extends Model
{
	protected $table = 'galeria_fotos';
	protected $primaryKey = 'id_foto';
	public $timestamps = false;

	protected $casts = [
		'id_mascota' => 'int',
		'es_principal' => 'bool',
		'fecha_subida' => 'datetime'
	];

	protected $fillable = [
		'id_mascota',
		'url_foto',
		'descripcion',
		'es_principal',
		'fecha_subida'
	];

	public function mascota()
	{
		return $this->belongsTo(Mascota::class, 'id_mascota');
	}
}
