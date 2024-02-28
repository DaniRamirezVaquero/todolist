<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Usuario;
use App\View\Components\Todolist\TodoSearchBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
  /**
   * Muestra la página principal
   * @return \Illuminate\Http\Response
   */
  public function main()
  {
    // Recupero el usuario
    $usuario = Auth::user();

    if ($usuario->admin) :
      $tareas = Tarea::all()->sortBy('idUsu');
    else :
      $tareas = $usuario->tareas->where('completa', false)->sortBy('fecha');
    endif;

    return view('usuario.main', ['tareas' => $tareas, 'usuario' => $usuario, 'search' => '']);
  }

  /**
   * Elimina el usuario
   */
  public function delete()
  {
    $usuario = Usuario::find(Auth::id());
    $usuario->delete();
    return redirect('/');
  }
}
