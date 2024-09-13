<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'routine_id',
        'client_id',
    ];

    public function routine()
    {
        return $this->belongsTo(Routine::class, 'routine_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function coach()
    {
        return $this->belongsTo(User::class, 'assigned_by'); // Asegúrate de que la columna `assigned_by` exista en tu tabla `assignments`
    }
}
