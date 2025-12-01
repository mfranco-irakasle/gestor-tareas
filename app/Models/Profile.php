<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    // Campos que permitimos rellenar masivamente
    protected $fillable = ['bio', 'github_url', 'website', 'user_id'];

    /** Relación Inversa 1:1 (Pertenece a User) */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
