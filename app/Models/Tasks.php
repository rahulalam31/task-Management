<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subject',
        'description',
        'start_date',
        'due_date',
        'status',
        'priority',
    ];

    public function notes()
    {
        return $this->hasMany(Notes::class, 'task_id', 'id');
    }
}
