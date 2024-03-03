<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckTaskOwner
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    $id = $request->route('id');

    $task = Tarea::find($id);

    if (Auth::check() && (Auth::user()->admin || Auth::user()->idUsu == $task->idUsu)) {
      return $next($request);
    }

    return redirect('/');
  }
}
