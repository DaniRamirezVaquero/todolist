<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Usuario;
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

  /**
   * Undocumented function
   *
   * @param Request $request
   * @param integer $id
   * @return void
   */
  public function mostrarPerfil(Request $request, $id = 1)
  {
    $fondo = $request->input('fondo');
    $tinta = $request->input('tinta');

    $usuario = Usuario::find($id);

    $colores = [
      'Rosa' => '#ff689d',
      'Azul' => '#109dfa',
      'Verde' => '#02ac66',
      'Amarillo' => '#e7d40a',
      'Rojo' => '#ef280f',
      'Naranja' => '#e36b2c',
      'Magenta' => '#c82a54',
      'Lila' => '#e69dfb',

    ];

    return view('usuario.perfil', [
      'usuario' => $usuario,
      'fondo' => "#{$fondo}",
      'tinta' => "#{$tinta}",
      'usuarios' => ['Pepe', 'Juan', 'Luis'],
      'colores' => $colores,
    ]);


    // echo "<b>Perfil del usuario con id $id</b>";

    // $usuario = Usuario::find($id);

    // echo "<br>Nombre: $usuario->nombre";
    // echo "<br>Apellido: $usuario->apellido";
    // echo "<br>Email: $usuario->email";

    // Si se ha pasado el parámetro color en la URL (GET)
    // http://localhost/usuario/5?color='azul'
    // if ($request->has('color')) {
    //     echo "<br>Color: " . $request->input('color');
    // }

    // Esto es como el $_SERVER de PHP
    // dd($request);
  }
}
