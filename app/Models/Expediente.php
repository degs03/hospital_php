<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;
    protected $table = 'expedientes'; //siempre va nombre de la tabla, tal cual como en la DB

    //definir los campos
    protected $fillable =[
        'numero',
        'anho',
        'descripcion',
        'estado',
        'hospital',
        'doctor',
        'id_pacientes'
    ];
    
    public function pacientes(){
        return $this->belongsTo(Paciente::class, 'id_pacientes');
    }

    public function consultas(){
        return $this->hasMany(Paciente::class, 'id_consultas');
    }
    
}
