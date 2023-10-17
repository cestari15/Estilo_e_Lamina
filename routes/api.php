<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('Servico/store',[ServicoController::class, 'store']);
  
Route::post('Servico/nome',[ServicoController::class,'pesquisarPorNome']);

Route::get('Servico/find/{id}',[ServicoController::class,'pesquisarPorId']);

Route::delete('Servico/delete/{id}', [ServicoController::class, 'delete']);

Route::put('Servicoupdate', [ServicoController::class, 'editar']);

Route::get('Servico/all',[ServicoController::class,'retornarTodos']);

//CLIENTESS

Route::post('Cliente/store',[ClienteController::class, 'store']);


Route::delete('Cliente/delete/{id}', [ClienteController::class, 'delete']);

Route::put('Cliente/update', [ClienteController::class, 'editar']);

Route::post('Cliente/nome',[ClienteController::class,'pesquisarPorNome']);
Route::get('Cliente/find/cep/{cep}',[ClienteController::class,'pesquisarPorCep']);

Route::get('Cliente/find/email/{email}',[ClienteController::class,'pesquisarPorEmail']);

Route::get('Cliente/find/celular/{celular}',[ClienteController::class,'pesquisarPorCelular']);

Route::get('Cliente/find/cpf/{cpf}',[ClienteController::class,'pesquisarPorCPF']);

Route::put('Cliente/senha',[ClienteController::class,'recuperarSenha']);

//Profisionais


Route::post('profissional/store',[ProfissionalController::class, 'store']);

Route::delete('profissional/delete/{id}', [ProfissionalController::class, 'delete']);

Route::put('profissional/update', [ProfissionalController::class, 'editar']);

Route::post('profissional/nome',[ProfissionalController::class,'pesquisarPorNome']);

Route::get('profissional/find/cep/{cep}',[ProfissionalController::class,'pesquisarPorCep']);

Route::get('profissional/find/email/{email}',[ProfissionalController::class,'pesquisarPorEmail']);

Route::get('profissional/find/celular/{celular}',[ProfissionalController::class,'pesquisarPorCelular']);

Route::get('profissional/find/cpf/{cpf}',[ProfissionalController::class,'pesquisarPorCPF']);

Route::put('profissional/senha',[ProfissionalController::class,'recuperarSenha']);

//agendas

Route::post('Agenda/store',[AgendaController::class, 'store']);

Route::delete('Agenda/delete/{id}', [AgendaController::class, 'delete']);

Route::put('Agenda/update', [AgendaController::class, 'editar']);

Route::post('Agenda/nome',[AgendaController::class,'pesquisarPorNome']);

Route::get('agenda/retornarTodos',[AgendaController::class,'retornarTodos']);






