<?php

namespace App\View\Components\Todolist;

use App\Models\Etiqueta;
use App\Models\Tarea;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TodoSearchBar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function search(Request $request)
    {
      $request->validate([
        'search' => 'required|string|max:40'
      ]);

      $tareas = Tarea::where('tarea', 'like', '%' . $request->input('search') . '%')
      ->orWhereHas('etiqueta', function ($query) use ($request) {
          $query->where('etiqueta', 'like', '%' . $request->input('search') . '%');
      })
      ->orWhere('completa', 'like', '%' . $request->input('search') . '%')
      ->get();

      return view('usuario.main', ['tareas' => $tareas, 'etiquetas' => Etiqueta::all(), 'usuario' => auth()->user(), 'search' => $request->input('search')]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.todolist.todo-seach-bar');
    }
}
