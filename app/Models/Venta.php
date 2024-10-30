<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    // Especificar la tabla asociada, si el nombre de la tabla no sigue la convención
    protected $table = 'ventas';

    // Los atributos que se pueden asignar masivamente
    protected $fillable = [
        'dni',
        'product_id',
        'cantidad',
        'total',
        'estado', // Agregado el campo estado
    ];

    // Definir la relación con el modelo Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
