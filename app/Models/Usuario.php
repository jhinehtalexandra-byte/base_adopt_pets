<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id_usuario
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string|null $telefono
 * @property string|null $direccion
 * @property string|null $ciudad
 * @property string|null $cedula
 * @property Carbon|null $fecha_nacimiento
 * @property int|null $id_rol
 * @property bool|null $activo
 * @property Carbon $fecha_registro
 * 
 * @property Role|null $role
 * @property Collection|Adopcione[] $adopciones
 * @property Collection|Comentario[] $comentarios
 * @property Collection|Seguimiento[] $seguimientos
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuarios';
	protected $primaryKey = 'id_usuario';
	public $timestamps = false;

	protected $casts = [
		'fecha_nacimiento' => 'datetime',
		'id_rol' => 'int',
		'activo' => 'bool',
		'fecha_registro' => 'datetime'
	];

	protected $fillable = [
		'nombre',
		'apellido',
		'email',
		'telefono',
		'direccion',
		'ciudad',
		'cedula',
		'fecha_nacimiento',
		'id_rol',
		'activo',
		'fecha_registro'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'id_rol');
	}

	public function adopciones()
	{
		return $this->hasMany(Adopcione::class, 'id_adoptante');
	}

	public function comentarios()
	{
		return $this->hasMany(Comentario::class, 'id_usuario');
	}

	public function seguimientos()
	{
		return $this->hasMany(Seguimiento::class, 'id_adoptante');
	}
}
