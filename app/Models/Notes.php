<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;


    public function tasks(): BelongsTo
    {
        return $this->belongsTo(Tasks::class, 'id', 'task_id');
    }
}
