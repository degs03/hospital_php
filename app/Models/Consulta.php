<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada a este modelo
    protected $table = 'consultas';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'sintomas',
        'descripcion',
        'tipo_consulta',
        'fecha',
        'estado',
        'receta',
        'id_expediente'
    ];
    public function expedientes(){
        return $this->belongsTo(Expediente::class,'id_expediente');
    }
}
