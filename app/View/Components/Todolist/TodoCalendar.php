<?php

namespace App\View\Components\Todolist;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class TodoCalendar extends Component
{
  public $tareas;

  public function __construct()
  {
      $usuario = Auth::user();
      $this->tareas = $usuario->tareas->where('completed', false)->map(function ($task) {
          $task->fecha = Carbon::parse($task->fecha)->format('Y-m-d');
          return $task;
      });
  }

  public function render(): View|Closure|string
  {
    $currentMonth = Carbon::now()->format('Y-m');
    $daysInMonth = Carbon::parse($currentMonth)->daysInMonth;
    $firstDayOfMonth = Carbon::parse($currentMonth)->firstOfMonth()->dayOfWeekIso;

    return view('components.todolist.todo-calendar', [
      'currentMonth' => $currentMonth,
      'daysInMonth' => $daysInMonth,
      'firstDayOfMonth' => $firstDayOfMonth,
      'tasks' => $this->tareas,
    ]);
  }
}
