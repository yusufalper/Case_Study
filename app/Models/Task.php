<?php

namespace App\Models;

use App\Models\DevTask;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'time',
        'difficulty',
        'finished',
        'is_done',
    ];

    public function devTasks(){
        return $this->hasMany(DevTask::class);
    }
}
