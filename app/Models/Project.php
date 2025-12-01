<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'deadline', 'budget', 'user_id'];

    // Castear deadline a objeto de fecha real (Carbon)
    protected $casts = [
        'deadline' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** Un proyecto tiene muchas tareas */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
