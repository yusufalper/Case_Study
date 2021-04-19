<?php

namespace App\Http\Livewire;

use App\Models\Developer;
use Livewire\Component;

class DevTasks extends Component
{
    public $devs, $selectedDev;

    public function selectDev($dev){
        $this->selectedDev = $dev;
        $this->emit('reRender', $this->selectedDev['id']);
    }

    public function render()
    {
        $this->devs = Developer::all();

        $this->selectedDev = $this->devs->first();

        return view('livewire.dev-tasks');
    }
}
