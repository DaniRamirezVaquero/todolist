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

    return view('usuario.main', ['tareas' => $usuario->tareas, 'usuario' => $usuario]);
  }
}
