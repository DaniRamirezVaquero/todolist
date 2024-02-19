<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{

  


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
