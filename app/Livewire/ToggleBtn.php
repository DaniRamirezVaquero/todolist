<?php

namespace App\Livewire;

use Livewire\Component;

class ToggleBtn extends Component
{
  public $state;

  public function mount()
  {
    // Recupera el estado de la sesión o usa 'false' como valor predeterminado
    $this->state = session()->get('toggleState', false);
  }

  public function toggle()
  {
    // Invierte el estado
    $this->state = !$this->state;

    // Almacena el estado en la sesión
    session()->put('toggleState', $this->state);

    // Emite un evento con el nuevo estado
    $this->dispatch('toggleStateChanged', $this->state);
  }

  public function render()
  {
    return view('livewire.toggle-btn');
  }
}
