<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Noticia
 * 
 * @property int $id_noticia
 * @property string $titulo
 * @property string $contenido
 * @property string|null $resumen
 * @property string|null $autor
 * @property Carbon $fecha_publicacion
 * @property bool|null $activa
 * @property string|null $categoria
 * @property string|null $imagen_url
 * @property Carbon $fecha_registro
 *
 * @package App\Models
 */
class Noticia extends Model
{
	protected $table = 'noticias';
	protected $primaryKey = 'id_noticia';
	public $timestamps = false;

	protected $casts = [
		'fecha_publicacion' => 'datetime',
		'activa' => 'bool',
		'fecha_registro' => 'datetime'
	];

	protected $fillable = [
		'titulo',
		'contenido',
		'resumen',
		'autor',
		'fecha_publicacion',
		'activa',
		'categoria',
		'imagen_url',
		'fecha_registro'
	];
}
