<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_recurso';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'Descripcion',
        'Valor',
        'Unidad_de_medida',
    ];
}
