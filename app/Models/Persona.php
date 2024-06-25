<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_persona';

    protected $fillable = [
        'Nombre',
        'Apellidos',
        'Direccion',
        'Telefono',
        'Sexo',
        'Profesion',
    ];
}

