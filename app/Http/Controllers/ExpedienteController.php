<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Expediente;
use App\Models\Paciente;
use Illuminate\Http\Request;

class ExpedienteController extends Controller
{
    public function ver_expedientes()       
    {
        $expedientes = Expediente::all();
        return view('expedientes.ver_expedientes', compact('expedientes'));
    }
    public function CrearExpediente(Request $request){

        $pacientes = Expediente::all();
        $pacientes = Expediente::create([
            'numero'=>$request->numero,
            'anho'=>$request->anho,
            'descripcion'=>$request->descripcion,
            'estado'=>$request->estado,
            'hospital'=>$request->hospital,
            'doctor'=>$request->doctor,
            'id_pacientes'=>$request->id_pacientes,
        ]);
        //Forma con SQL
        /*$clientes = DB::insert('insert into clientes (nombre, apellido, documento, telefono, direccion, activo) values (?,?,?,?,?,?)', [
            $nombre,
            $apellido,
            $documento,
            $telefono,
            $direccion,
            $activo
        ]);*/   
        return redirect()->route('ver_expedientes')->with('success', 'Expediente creado correctamente');
    }
    public function ver_formulario(){
        $pacientes= Paciente::pluck('nombre', 'id');
        return view('expedientes.formulario', compact('pacientes'));
    }
    public function ver_detalle_expedientes($id){
        $expediente = Expediente::with('pacientes')
        ->where('id',$id)
        ->firstOrFail();

        $consultas = Consulta::with('expedientes')
        ->where('id_expediente',$id)
        ->get();
        return view('expedientes.ver_detalle_expediente', compact('expediente', 'consultas'));
    }
}
