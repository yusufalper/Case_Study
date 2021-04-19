<?php

namespace App\Models;

use App\Models\DevTask;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = [
        'developer',
        'time',
        'ability',
    ];

    public function devTasks(){
        return $this->hasMany(DevTask::class);
    }

}
