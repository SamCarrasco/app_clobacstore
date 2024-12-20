<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Especifica el nombre de la tabla
    protected $table = 'contact';

    // Especifica qué columnas pueden ser asignadas en masa
    protected $fillable = ['nombre', 'email', 'mensaje', 'numero'];

    public $timestamps = false;
}
