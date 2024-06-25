<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyectos';
    protected $primaryKey = 'Id_proyecto';
    public $timestamps = true;

    protected $fillable = [
        'Descripcion',
        'Fecha_inicio',
        'Fecha_entrega',
        'Valor',
        'Lugar',
        'Responsable',
        'Estado',
    ];

    public function responsable()
{
    return $this->belongsTo(Persona::class, 'Responsable', 'Id_persona');
}

}
