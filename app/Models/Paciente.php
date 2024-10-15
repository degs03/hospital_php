<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes'; //siempre va nombre de la tabla, tal cual como en la DB

    //definir los campos
    protected $fillable =[
        'nombre',
        'apellido',
        'documento',
        'telefono',
        'estado'
    ];
    
    public function expedientes(){
        return $this->hasMany(Paciente::class, 'id_pacientes');
    }
}
