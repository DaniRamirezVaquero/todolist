<?php

namespace App\View\Components\Todolist;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TodoInput extends Component
{

  /**
   * Create a new component instance.
   */
  public function __construct(public string $valor="")
  {
    $this->valor = $valor;
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.todolist.todo-input');
  }
}
