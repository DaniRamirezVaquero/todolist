<?php
namespace App\Http\Livewire;

use Livewire\Component;

class ToggleButton extends Component
{
    public $state = 0;

    public function toggle()
    {
        $this->state = $this->state === 0 ? 1 : 0;
    }

    public function render()
    {
        return view('livewire.toggle-button');
    }
}
?>
