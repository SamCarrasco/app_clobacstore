<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario'; // Nombre de la tabla
    public $timestamps = false; // Si no tienes campos created_at/updated_at en la tabla

    protected $fillable = ['login', 'password', 'estado', 'rol'];

    /**
     * Define el campo que se usará como identificador.
     *
     * @return string
     */
    public function username()
    {
        return 'login';
    }
}
