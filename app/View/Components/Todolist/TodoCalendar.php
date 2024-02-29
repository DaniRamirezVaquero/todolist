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
  public $currentMonth;

  public function __construct()
  {
      $usuario = Auth::user();
      $this->tareas = $usuario->tareas->where('completa', false)->map(function ($task) {
          $task->fecha = Carbon::parse($task->fecha)->format('Y-m-d');
          return $task;
      });
      $this->currentMonth = Carbon::now()->format('Y-m');
  }

  public function render(): View|Closure|string
  {
    $daysInMonth = Carbon::parse($this->currentMonth)->daysInMonth;
    $firstDayOfMonth = Carbon::parse($this->currentMonth)->firstOfMonth()->dayOfWeekIso;

    return view('components.todolist.todo-calendar', [
      'currentMonth' => $this->currentMonth,
      'daysInMonth' => $daysInMonth,
      'firstDayOfMonth' => $firstDayOfMonth,
      'tasks' => $this->tareas,
    ]);
  }

  public function nextMonth()
  {
    $this->currentMonth = Carbon::parse($this->currentMonth)->addMonth()->format('Y-m');
  }

  public function previousMonth()
  {
    $this->currentMonth = Carbon::parse($this->currentMonth)->subMonth()->format('Y-m');
  }
}
