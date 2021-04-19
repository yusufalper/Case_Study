<?php

namespace App\Models;

use App\Models\Task;
use App\Models\Developer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DevTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'developer_id',
        'task_id',
        'week',
        'comp_time',
    ];

    public function developer()
    {
        return $this->belongsTo(Developer::class, 'developer_id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
