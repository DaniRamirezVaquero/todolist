<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
	use HasFactory;

	// Indicamos el nombre de la tabla y su clave primaria en la base de datos
	protected $table = 'tarea';
	protected $primaryKey = 'idTar';

	// Indicamos al modelos cuales son los atributos de asignación masiva
	protected $fillable = [
		'texto',
		'fecha',
		'idUsu'
	];

    public function toggle(){
        $this->completada = !$this->completada;
        $this->save();
    }

	//
	public function usuario()
	{

		// Utilizamos el método belongsTo() para indicar que una tarea pertenece a un usuario
		// Este método recupera el usuario al que pertenece una tarea en un objeto de tipo Relation

		// Si hemos usado la nomenclatura propia de laravel podemos hacerlo así:
		// return $this->belongsTo(Usuario:class);

		// Si no, debemos indicar el nombre de la clase y el nombre de la clave foránea
		// siempre que este se llame igual que la clave primaria de la tabla a la que hace referencia
		// en este caso 'idUsu', si no se llamara así, deberíamos indicarlo como segundo parámetro
		return $this->belongsTo(Usuario::class, 'idUsu');
	}

	public function etiquetas()
	{
		// Utilizamos el método belongsToMany() para indicar que una tarea puede tener varias etiquetas
		// Este método recupera las etiquetas de una tarea en un objeto de tipo Relation
		return $this->belongsToMany(Etiqueta::class, 'tarea_etiqueta', 'idTar', 'idEti');
	}

	/**
	 * Nos permite especificar el tipo de dato al que se
     * debe convertir un atributo al ser serializado.
	 *
	 * @var array
	 */
	protected $casts = [
		'fecha' => 'date',
	];
}
