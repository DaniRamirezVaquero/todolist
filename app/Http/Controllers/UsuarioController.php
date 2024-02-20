<?php

namespace App\Http\Controllers;

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

    $tareas = $usuario->tareas->sortBy('fecha');

    return view('usuario.main', ['tareas' => $tareas, 'usuario' => $usuario]);
  }
}
