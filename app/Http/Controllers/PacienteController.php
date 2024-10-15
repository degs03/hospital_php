<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function ver_pacientes()
    {
        $pacientes = Paciente::all();
        return view('pacientes.ver_pacientes', compact('pacientes'));
    }
    public function CrearPaciente(Request $request){

        //validacion
        $validacion = [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:22',
            'documento' => 'required|unique:clientes,documento|max:20',
            'telefono' => 'required|string|max:22',
            'direccion' => 'required|string|max:22',   
            'estado' => 'required',
        ];

        //mensaje personalizado
        $mensaje = [
            'nombre.required'=>'El campo nombre es obligatorio',
            'documento.unique'=>'El numero de documento ya esta registrado'
        ];
        //Validar datos
        $validar_datos= $request->validate($validacion, $mensaje);

        //Insertar datos en la tabla
        //utilizando eloquent

        $pacientes = Paciente::all();
        $pacientes = Paciente::create([
            'nombre'=>$request->nombre,
            'apellido'=>$request->apellido,
            'documento'=>$request->documento,
            'telefono'=>$request->telefono,
            'direccion'=>$request->direccion,
            'activo'=>$request->estado,
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
        return redirect()->route('ver_pacientes')->with('success', 'Paciente creado correctamente');
    }
    public function ver_formulario(){
        return view('pacientes.formulario');
    }
}
