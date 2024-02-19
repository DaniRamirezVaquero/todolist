<?php

namespace App\View\Components;

use App\Models\Tarea;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TodoTaskCard extends Component
{
  public Tarea $tarea;

  public function __construct($tarea)
  {
      $this->tarea = $tarea;
  }

  public function render()
  {
      return view('components.todo-card');
  }
}
