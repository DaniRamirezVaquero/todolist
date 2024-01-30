<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;

    // Indicamos el nombre de la tabla y su clave primaria en la base de datos
    protected $table = 'etiqueta';
    protected $primaryKey = 'idEti';

    protected $fillable = [
        'etiqueta',
        'color'
    ];

    // Indicamos al modelo que no vamos a usar los campos created_at ni updated_at
    public $timestamps = false;
}
