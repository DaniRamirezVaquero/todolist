<?php

namespace App\View\Components\Todolist;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TodoSelectColor extends Component
{

  public $colores =
        [
          "Rosa" => "e75480",
          "Azul" => "0000ff",
          "Verde" => "00ff00",
          "Amarillo" => "ffff00",
          "Morado" => "9b59b6",
          "Marrón" => "804000",
          "Negro" => "000000",
          "Rojo" => "ff0000",
          "Blanco" => "ffffff",
          "Magenta" => "ff00ff",
          "Gris" => "666666",
          "Naranja" => "ff8000",
        ];

    /**
     * Create a new component instance.
     */
    public function __construct(public string $seleccion)
    {

    }

    /**
     * Esto sirve para comparar el color seleccionado con el instanciado
     * para que al enviar el formulario se sepa que color está seleccionado
     *
     * @param string $color
     * @return void
     */
    public function seleccionado (string $color) {
      return ($color === ltrim($this->seleccion, "#"))?"selected":"";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.todolist.todo-select-color');
    }
}
