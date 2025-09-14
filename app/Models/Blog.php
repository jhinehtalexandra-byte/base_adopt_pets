<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Blog
 * 
 * @property int $id_blog
 * @property string $titulo
 * @property string $contenido
 * @property string|null $resumen
 * @property string|null $autor
 * @property Carbon $fecha_publicacion
 * @property bool|null $activo
 * @property string|null $categoria
 * @property string|null $imagen_url
 * @property int|null $visitas
 * @property Carbon $fecha_registro
 *
 * @package App\Models
 */
class Blog extends Model
{
	protected $table = 'blog';
	protected $primaryKey = 'id_blog';
	public $timestamps = false;

	protected $casts = [
		'fecha_publicacion' => 'datetime',
		'activo' => 'bool',
		'visitas' => 'int',
		'fecha_registro' => 'datetime'
	];

	protected $fillable = [
		'titulo',
		'contenido',
		'resumen',
		'autor',
		'fecha_publicacion',
		'activo',
		'categoria',
		'imagen_url',
		'visitas',
		'fecha_registro'
	];
}
