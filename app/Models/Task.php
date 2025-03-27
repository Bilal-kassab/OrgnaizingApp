<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    protected $fillable=[
        'description','name','room_id','user_id','money'
    ];

    public function room():BelongsTo
    {
        return $this->belongsTo(Room::class,'room_id');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function taskDetails():HasMany
    {
        return $this->hasMany(TaskDetail::class,'task_id');
    }
}
