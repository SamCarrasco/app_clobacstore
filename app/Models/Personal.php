<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'personal';
    public $timestamps = false; // Desactiva timestamps si no están en la tabla.

    protected $fillable = ['nombre', 'ap_paterno', 'ap_materno', 'genero', 'celular', 'direccion', 'tipopersona'];

    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id', 'id');
    }
}
