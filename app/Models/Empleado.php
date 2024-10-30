<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Importa esta clase
use Illuminate\Notifications\Notifiable;

class Empleado extends Authenticatable // Cambia Model por Authenticatable
{
    use HasFactory, Notifiable; // Añade Notifiable si lo necesitas

    // Nombre de la tabla asociada
    protected $table = 'empleados';

    // Campos asignables en la tabla empleados
    protected $fillable = [
        'dni',
        'tipo',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Otros métodos o propiedades del modelo pueden ir aquí
}
