<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Developer;
use App\Services\AttachTasksToDevsService;

class HomeController extends Controller
{
    public function home(){
        $tasksCount = count(Task::all());
        $devsCount = count(Developer::all());
        if ($tasksCount < 1 || $devsCount < 1) {
            return view('home')
                ->with('homeText', 'You have to do migrations and run that command first -> "php artisan getdata" ')
                ->with('added', false);
        }

        AttachTasksToDevsService::attachTasks();

        return view('home')
            ->with('homeText', 'Providers Successfully Added.')
            ->with('added', true);
    }
}
