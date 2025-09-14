<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $id_rol
 * @property string $nombre_rol
 * @property string|null $descripcion
 * @property Carbon $fecha_creacion
 * 
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';
	protected $primaryKey = 'id_rol';
	public $timestamps = false;

	protected $casts = [
		'fecha_creacion' => 'datetime'
	];

	protected $fillable = [
		'nombre_rol',
		'descripcion',
		'fecha_creacion'
	];

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'id_rol');
	}
}
