<?php

namespace App\View\Components\Todolist;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TodoSelectLang extends Component
{
  /**
   * Create a new component instance.
   */
  public function __construct()
  {
    //
  }

  /**
   * Cambia el idioma de la aplicación.
   *
   * @param string $lang
   * @return void
   */
  public function setLanguage($lang)
  {
    // Guardamos el idioma en la sesión y lo establecemos en la aplicación
    session(['app_locale' => $lang]);
    app()->setLocale(session('app_locale'));

    // Luego, redirige al usuario de vuelta a la página en la que estaba
    return redirect()->back();
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.todolist.todo-select-lang');
  }
}
