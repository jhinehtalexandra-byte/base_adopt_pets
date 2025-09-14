<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comentario
 * 
 * @property int $id_comentario
 * @property int|null $id_usuario
 * @property string $tipo_contenido
 * @property int $id_contenido
 * @property string $comentario
 * @property bool|null $activo
 * @property Carbon $fecha_comentario
 * 
 * @property Usuario|null $usuario
 *
 * @package App\Models
 */
class Comentario extends Model
{
	protected $table = 'comentarios';
	protected $primaryKey = 'id_comentario';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_contenido' => 'int',
		'activo' => 'bool',
		'fecha_comentario' => 'datetime'
	];

	protected $fillable = [
		'id_usuario',
		'tipo_contenido',
		'id_contenido',
		'comentario',
		'activo',
		'fecha_comentario'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}
}
