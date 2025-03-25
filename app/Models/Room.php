<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $fillable=[
        'owner_id','description','name'
    ];

    public function owner():BelongsTo
    {
        return $this->belongsTo(User::class,'owner_id');
    }

    public function members():HasMany
    {
        return $this->hasMany(Member::class,'room_id');
    }

    public function tasks():HasMany
    {
        return $this->hasMany(Task::class,'room_id');
    }
}
