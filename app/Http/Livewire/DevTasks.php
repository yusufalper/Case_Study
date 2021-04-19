<?php

namespace App\Http\Livewire;

use App\Models\Developer;
use App\Models\DevTask;
use Livewire\Component;

class DevTasks extends Component
{
    public $devs, $selectedDev, $deadline;

    public function selectDev($dev){
        $this->selectedDev = $dev;
        $this->emit('reRender', $this->selectedDev['id']);
    }

    public function render()
    {
        $this->devs = Developer::all();

        $this->selectedDev = $this->devs->first();

        $this->deadline = DevTask::all()->max('week');

        return view('livewire.dev-tasks');
    }
}
