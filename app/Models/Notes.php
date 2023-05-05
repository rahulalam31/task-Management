<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subject',
        'attachment',
        'note'
    ];

    public function tasks()
    {
        return $this->belongsTo(Tasks::class, 'id', 'task_id');
    }
}
