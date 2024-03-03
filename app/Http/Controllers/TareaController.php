<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use App\Models\Tarea;
use App\Rules\afterDate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TareaController extends Controller
{

  public function new()
  {
    return view('task.newTask', ['etiquetas' => Etiqueta::all()]);
  }

  public function create(Request $request)
  {

    $request->validate([
      'tarea' => 'required|string|max:40',
      'fecha' => ['required', 'date', new afterDate],
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

    return redirect()->back();
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

    return redirect()->back();
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

    return redirect()->back();
  }

  /**
   * Muestra el formulario de edición de una tarea
   *
   * @param [type] $id
   * @return void
   */
  public function edit($id)
  {
    // Guarda la URL de la página anterior en la sesión
    session(['previous_url' => url()->previous()]);

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
      'fecha' => ['required', 'date', new afterDate],
      'etiqueta' => 'required|numeric|exists:etiqueta,idEti'
    ]);

    $tarea = Tarea::find($id);
    $tarea->idEti = $request->input('etiqueta');
    $tarea->tarea = $request->input('tarea');
    $tarea->fecha = $request->input('fecha');
    $tarea->save();

    // Redirige a la URL almacenada en la sesión
    return redirect(session('previous_url'));
  }

  /**
   * Elimina todas las tareas
   *
   * @return void
   */
  public function deleteAll()
  {
    Tarea::where('idUsu', auth()->id())->delete();

    return redirect()->route('main');
  }

  /**
   * Obtiene las tareas de un día concreto
   *
   * @param [type] $date
   * @return void
   */
  public function getTasksByDay($date)
  {
    $usuario = Auth::user();
    $tareas = Tarea::where('idUsu', auth()->id())->where('fecha', $date)->get();
    $date = Carbon::parse($date)->format('d/m/Y');

    return view('usuario.main', ['tareas' => $tareas, 'usuario' => $usuario, 'search' => $date]);
  }
}
