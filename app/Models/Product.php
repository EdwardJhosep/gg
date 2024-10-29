<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define el nombre de la tabla si es diferente del plural del modelo
    protected $table = 'products';

    // Define los campos que se pueden llenar (mass assignable)
    protected $fillable = [
        'nombre',
        'imagen',
        'stock',
        'precio',
        'descripcion',
    ];

    // Si necesitas definir relaciones, puedes hacerlo aquí.
    // Por ejemplo, si un producto tiene una relación con otra tabla:
    // public function otraTabla()
    // {
    //     return $this->belongsTo(OtraTabla::class);
    // }
}
