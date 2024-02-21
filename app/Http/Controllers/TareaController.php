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


  public function completar($id)
{
    $tarea = Tarea::find($id);
    $tarea->completa = true;
    $tarea->save();

    return response()->json(['success' => true]);
}

public function incompletar($id)
{
    $tarea = Tarea::find($id);
    $tarea->completa = false;
    $tarea->save();

    return response()->json(['success' => true]);
}
}
