<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;


    public function notes(): HasMany
    {
        return $this->hasMany(Notes::class, 'task_id', 'id');
    }
}
