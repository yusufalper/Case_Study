<?php

namespace App\Http\Livewire;

use App\Models\Developer;
use App\Models\DevTask;
use Livewire\Component;

class Table extends Component
{
    public $dev;
    public $devTasks;

    protected $listeners = ['reRender' => 'reRender'];

    public function mount($dev){
        $this->dev = $dev;
    }

    public function reRender($dev_id){
        $this->dev = Developer::find((int)$dev_id);
    }

    public function render()
    {
        $this->devTasks = DevTask::where('developer_id', $this->dev->id)->get();
        return view('livewire.table');
    }
}
