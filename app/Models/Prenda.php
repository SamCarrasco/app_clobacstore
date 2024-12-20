<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prenda extends Model
{
    use HasFactory;

    protected $table = 'prenda';

    public $timestamps = false; // Deshabilitar timestamps

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'estado',
        'stock',
        'id_categoria',
        'id_subcategoria',
        'id_imagen',
        'id_descuento',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class, 'id_subcategoria');
    }

    public function imagen()
    {
        return $this->belongsTo(Imagenes::class, 'id_imagen');
    }

    public function descuento()
    {
        return $this->belongsTo(Descuento::class, 'id_descuento');
    }
}