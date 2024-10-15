<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\inicioController;
use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio',[inicioController::class,'index']);
Route::post('/CrearCliente',[ClienteController::class,'CrearCliente']);
Route::get('/ver_clientes',[ClienteController::class,'ver_clientes'])->name('ver_clientes');
Route::get('/show_cliente/{id}',[ClienteController::class,'show_cliente']);
Route::get('/delete_cliente/{id}',[ClienteController::class,'delete_cliente']);
Route::get('/update_cliente',[ClienteController::class,'update_cliente']);
Route::get('/ver_formulario',[ClienteController::class,'ver_formulario']);
Route::put('/update_cliente/{id}',[ClienteController::class,'update_cliente'])->name('update_cliente');
Route::post('/desactivar/{id}',[ClienteController::class,'desactivar'])->name('desactivar');
Route::post('/activar/{id}',[ClienteController::class,'activar'])->name('activar');

//Paciente

Route::get('/ver_pacientes',[PacienteController::class,'ver_pacientes'])->name('ver_pacientes');
Route::get('/ver_formulario_paciente',[PacienteController::class,'ver_formulario']);
Route::post('/CrearPaciente',[PacienteController::class,'CrearPaciente']);

//Expedientes
Route::get('/ver_expedientes',[ExpedienteController::class,'ver_expedientes'])->name('ver_expedientes');
Route::get('/ver_detalle_expedientes/{id}',[ExpedienteController::class,'ver_detalle_expedientes'])->name('ver_detalle_expedientes');
Route::get('/ver_formulario_expedientes',[ExpedienteController::class,'ver_formulario']);
Route::post('/CrearExpediente',[ExpedienteController::class,'CrearExpediente']);



