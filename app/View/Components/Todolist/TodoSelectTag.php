<?php

namespace App\View\Components\Todolist;

use App\Models\Etiqueta;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TodoTaskCard extends Component
{
  public array $etiquetas;

  public function __construct($etiquetas)
  {
      $this->etiquetas = $etiquetas;
  }



  public function render()
  {
      return view('components.todolist.todo-select-tag');
  }
}
