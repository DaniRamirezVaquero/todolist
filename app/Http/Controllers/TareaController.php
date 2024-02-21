<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{

  public function new()
  {
    return view('task.newTask', ['etiquetas' => Etiqueta::all()]);
  }

  public function create(Request $request)
  {

    dd($request->all());

    $request->validate([
      'tarea' => 'required|string|max:40',
      'fecha' => 'required|date|after:yesterday',
      'etiqueta' => 'required|numeric|exists:etiqueta,idEti'
    ]);

    $tarea = new Tarea();
    $tarea->idUsu = auth()->id();
    $tarea->idEti = $request->input('etiqueta');
    $tarea->tarea = $request->input('tarea');
    $tarea->completa = false;
    $tarea->fecha = $request->input('fecha');
    $tarea->save();

    return redirect()->route('main');
  }

  /**
   * Marca una tarea como completada
   *
   * @param [int] $id
   * @return void
   */
  public function check($id)
  {
    $tarea = Tarea::find($id);
    $tarea->completa = true;
    $tarea->save();

    return redirect()->route('main');
  }

  /**
   * Marca una tarea como no completada
   *
   * @param [int] $id
   * @return void
   */
  public function uncheck($id)
  {
    $tarea = Tarea::find($id);
    $tarea->completa = false;
    $tarea->save();

    return redirect()->route('main');
  }

  /**
   * Elimina una tarea
   *
   * @param [int] $id
   * @return void
   */
  public function delete($id)
  {

    $tarea = Tarea::find($id);
    $tarea->delete();

    return redirect()->route('main');
  }

  /**
   * Muestra el formulario de edición de una tarea
   *
   * @param [type] $id
   * @return void
   */
  public function edit($id)
  {
    return view('task.editTask', ['tarea' => Tarea::find($id), 'etiquetas' => Etiqueta::all()]);
  }

  /**
   * Actualiza una tarea
   *
   * @param Request $request
   * @param [type] $id
   * @return void
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'tarea' => 'required|string|max:40',
      'fecha' => 'required|date|after:yesterday',
      'etiqueta' => 'required|numeric|exists:etiqueta,idEti'
    ]);

    $tarea = Tarea::find($id);
    $tarea->idEti = $request->input('etiqueta');
    $tarea->tarea = $request->input('tarea');
    $tarea->fecha = $request->input('fecha');
    $tarea->save();

    return redirect()->route('main');
  }
}
