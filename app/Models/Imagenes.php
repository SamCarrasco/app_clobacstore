<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    use HasFactory;

    protected $table = 'imagenes';

    public $timestamps = false; // Deshabilitar timestamps

    protected $fillable = [
        'imagen',
        'descripcion',
        'estado',
    ];
}
