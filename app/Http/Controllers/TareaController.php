<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use App\Models\Tarea;
use App\Rules\afterDate;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TareaController extends Controller
{

  /**
   * Show the form for creating a new task.
   *
   * @return View
   */
  public function new(): View
  {
    return view('task.newTask', ['etiquetas' => Etiqueta::all()]);
  }

  /**
   * Create a new task
   *
   * @param Request $request
   * @return void
   */
  public function create(Request $request): RedirectResponse
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
   * Marks a task as completed
   *
   * @param int $id
   * @return RedirectResponse
   */
  public function check($id): RedirectResponse
  {
    $tarea = Tarea::find($id);
    $tarea->completa = true;
    $tarea->save();

    return redirect()->back();
  }

  /**
   * Marks a task as not completed
   *
   * @param int $id
   * @return RedirectResponse
   */
  public function uncheck($id): RedirectResponse
  {
    $tarea = Tarea::find($id);
    $tarea->completa = false;
    $tarea->save();

    return redirect()->back();
  }

  /**
   * Deletes a task
   *
   * @param int $id
   * @return RedirectResponse
   */
  public function delete($id): RedirectResponse
  {

    $tarea = Tarea::find($id);
    $tarea->delete();

    return redirect()->back();
  }

  /**
   * Show the form for editing a task
   *
   * @param [int $id
   * @return View
   */
  public function edit($id): View
  {
    // Guarda la URL de la página anterior en la sesión
    session(['previous_url' => url()->previous()]);

    return view('task.editTask', ['tarea' => Tarea::find($id), 'etiquetas' => Etiqueta::all()]);
  }

  /**
   * Update a task
   *
   * @param Request $request
   * @param int $id
   * @return RedirectResponse
   */
  public function update(Request $request, $id): RedirectResponse
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
   * Deletes all tasks
   *
   * @return RedirectResponse
   */
  public function deleteAll(): RedirectResponse
  {
    Tarea::where('idUsu', auth()->id())->delete();

    return redirect()->route('main');
  }

  /**
   * Deletes all completed tasks
   *
   * @param string $date
   * @return View
   */
  public function getTasksByDay($date): View
  {
    $usuario = Auth::user();
    $tareas = Tarea::where('idUsu', auth()->id())->where('fecha', $date)->get();
    $date = Carbon::parse($date)->format('d/m/Y');

    return view('usuario.main', ['tareas' => $tareas, 'usuario' => $usuario, 'search' => $date]);
  }
}
