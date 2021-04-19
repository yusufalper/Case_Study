<?php

namespace App\Services;

use App\Models\Task;
use App\Models\Developer;
use App\Models\DevTask;

class AttachTasksToDevsService
{
    public static function attachTasks(){

        $devs = Developer::orderBy('ability', 'DESC')->get();

        $week = [];
        $remain = [];
        $newWeek = false;
        while (true) {
            foreach ($devs as $devKey => $dev) {
                if ($newWeek === true) {
                    foreach ($week as $key => $value) {
                        $week[$key] = $value +1;
                        $remain[$key] = 45;
                    }
                    $newWeek = false;
                }else {
                    if (!array_key_exists($devKey, $remain)) {
                        $remain[$devKey] = 45;
                    } 
    
                    if (!array_key_exists($devKey, $week)) {
                        $week[$devKey] = 1;
                    }
                }
                $tasks = Task::orderBy('difficulty', 'DESC')->where('is_done', false)->get();
                if (AttachTasksToDevsService::isLastWeek($tasks)) {
                    //burda kaldım
                }

                foreach ($tasks as $taskKey => $task) {
                    
                    $taskTime = (($task->time * $task->difficulty) - $task->finished) / $dev->ability;
    
                    if ($remain[$devKey] >= $taskTime) {
                        $remain[$devKey] = $remain[$devKey] - $taskTime;
                        DevTask::create([
                            'developer_id' => $dev->id,
                            'task_id' => $task->id,
                            'week' => $week[$devKey],
                            'comp_time' => $taskTime,
                        ]);
    
                        $task->finished += $taskTime;
                        $task->is_done = true;
                        $task->save();
                    } else {
                        $halfJob = $taskTime - $remain[$devKey];
    
                        DevTask::create([
                            'developer_id' => $dev->id,
                            'task_id' => $task->id,
                            'week' => $week[$devKey],
                            'comp_time' => $remain[$devKey],
                        ]);

                        $remain[$devKey] = 0;
    
                        $task->finished += $taskTime - $halfJob;
                        $task->save();
                    }

                    if (($week[$devKey] === max($week) && count($week) > 1 && $remain[$devKey] <= 0) || (count(array_flip($week)) === 1 && $remain[$devKey] <= 0)) {
                        break;
                    } 
                }
            }

            if (count(Task::orderBy('difficulty', 'DESC')->where('is_done', false)->get()) <= 0) {
                break;
            }else {
                if (count($remain) === count($devs) && count(array_flip($remain)) === 1 && end($remain) === 0){
                    $newWeek = true;
                }
            }
        }        
    }

    public static function isLastWeek($tasks){
        $sum = 0;
        foreach ($tasks as $key => $task) {
            $sum += ($task->difficulty * $task->time) - $task->finished;
        }
        $devsAvg= Developer::all()->avg('ability');

        if ($sum < 45*$devsAvg) {
            return true;
        }
        return false;
    }
}
