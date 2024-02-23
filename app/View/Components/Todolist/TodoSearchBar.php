<?php

namespace App\View\Components\Todolist;

use App\Models\Etiqueta;
use App\Models\Tarea;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class TodoSearchBar extends Component
{

  public $state;
  /**
   * Create a new component instance.
   */
  public function __construct()
  {
    $this->state = session()->get('toggleState');
  }

  protected $listeners = ['toggleStateChanged' => 'updateState'];

  public function updateState($state)
  {
    $this->state = $state;
  }

  public function search(Request $request)
  {
    $tareas = Tarea::query();

    if ($request->filled('search')) {
      $tareas->where('tarea', 'like', '%' . $request->input('search') . '%')
        ->orWhereHas('etiqueta', function ($query) use ($request) {
          $query->where('etiqueta', 'like', '%' . $request->input('search') . '%');
        });
    }

    $tareas->where('completa', $this->state);

    $tareas = $tareas->get()->sortBy('fecha');

    if (!Auth::user()->admin) {
      $tareas = $tareas->where('idUsu', Auth::id());
    }

    return view('usuario.main', ['tareas' => $tareas, 'etiquetas' => Etiqueta::all(), 'usuario' => Auth::user(), 'search' => $request->input('search')]);
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.todolist.todo-seach-bar');
  }
}
