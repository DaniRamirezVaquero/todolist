<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Usuario;
use App\View\Components\Todolist\TodoSearchBar;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
  /**
   * Show the user's main view
   *
   * @return View
   */
  public function main(): View
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
   * Deletes the user
   *
   * @return RedirectResponse
   */
  public function delete(): RedirectResponse
  {
    $usuario = Usuario::find(Auth::id());
    $usuario->delete();
    return redirect('/');
  }
}
