<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Authenticatable
{

    // Indicamos el nombre de la tabla y su clave primaria en la base de datos
    protected $table = 'usuario';
    protected $primaryKey = 'idUsu';

    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'foto',
    ];

    /**
     * Los atributos que deben estar ocultos para las matrices o cuando hagamos consultas.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];


    /**
     * Devuelve las tareas de un usuario
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tareas()
    {
        // Utilizamos el método hasMany() para indicar que un usuario puede tener varias tareas
        // Este método recupera todas las tareas que pertenecen a un usuario en un objeto de tipo Relation
        return $this->hasMany(Tarea::class, 'idUsu');

        // Si hemos usado la nomenclatura propia de laravel podemos hacerlo así:
        // return $this->hasMany('App\Models\Tarea', 'idUsu');
        // return $this->hasMany('App\Models\Tarea', 'idUsu', 'idUsu');
        // return $this->hasMany(Tarea::class, 'idUsu', 'idUsu');
    }
}
