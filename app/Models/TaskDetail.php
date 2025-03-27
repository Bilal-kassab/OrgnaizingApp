<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskDetail extends Model
{
    use HasFactory;

    protected $fillable=[
        'check','body','task_id','price'
    ];

    public function task():BelongsTo
    {
        return $this->belongsTo(Task::class,'task_id');
    }
}
