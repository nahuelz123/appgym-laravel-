<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'file_path',
        'coach_id',
    ];

    public function coach()
    {
        return $this->belongsTo(User::class, 'coach_id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'routine_id');
    }
}
