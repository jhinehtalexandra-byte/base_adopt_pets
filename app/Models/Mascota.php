<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Mascota
 * 
 * @property int $id_mascota
 * @property string $nombre
 * @property string $especie
 * @property string|null $raza
 * @property int|null $edad_aproximada
 * @property string $sexo
 * @property string $tamaño
 * @property float|null $peso
 * @property string|null $color
 * @property string|null $descripcion
 * @property string|null $estado_salud
 * @property bool|null $vacunado
 * @property bool|null $esterilizado
 * @property bool|null $microchip
 * @property string|null $estado_adopcion
 * @property Carbon|null $fecha_ingreso
 * @property int|null $id_refugio
 * @property Carbon $fecha_registro
 * 
 * @property Refugio|null $refugio
 * @property Collection|Adopcione[] $adopciones
 * @property Collection|GaleriaFoto[] $galeria_fotos
 * @property Collection|Seguimiento[] $seguimientos
 *
 * @package App\Models
 */
class Mascota extends Model
{
	protected $table = 'mascotas';
	protected $primaryKey = 'id_mascota';
	public $timestamps = false;

	protected $casts = [
		'edad_aproximada' => 'int',
		'peso' => 'float',
		'vacunado' => 'bool',
		'esterilizado' => 'bool',
		'microchip' => 'bool',
		'fecha_ingreso' => 'datetime',
		'id_refugio' => 'int',
		'fecha_registro' => 'datetime'
	];

	protected $fillable = [
		'nombre',
		'especie',
		'raza',
		'edad_aproximada',
		'sexo',
		'tamaño',
		'peso',
		'color',
		'descripcion',
		'estado_salud',
		'vacunado',
		'esterilizado',
		'microchip',
		'estado_adopcion',
		'fecha_ingreso',
		'id_refugio',
		'fecha_registro'
	];

	public function refugio()
	{
		return $this->belongsTo(Refugio::class, 'id_refugio');
	}

	public function adopciones()
	{
		return $this->hasMany(Adopcione::class, 'id_mascota');
	}

	public function galeria_fotos()
	{
		return $this->hasMany(GaleriaFoto::class, 'id_mascota');
	}

	public function seguimientos()
	{
		return $this->hasMany(Seguimiento::class, 'id_mascota');
	}
}
