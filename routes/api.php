<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;
use App\Models\Profissional;
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
Route::post('servico/store',[ServicoController::class, 'store']);
  
Route::post('servico/nome',[ServicoController::class,'pesquisarPorNome']);

Route::get('servico/find/{id}',[ServicoController::class,'pesquisarPorId']);

Route::delete('servico/delete/{id}', [ServicoController::class, 'delete']);

Route::put('servico/update', [ServicoController::class, 'editar']);

Route::get('servico/all',[ServicoController::class,'retornarTodos']);

//CLIENTESS

Route::post('cliente/store',[ClienteController::class, 'store']);

Route::get('cliente/find/{id}',[ClienteController::class,'pesquisarPorId']);

Route::delete('cliente/delete/{id}', [ClienteController::class, 'delete']);

Route::put('cliente/update', [ClienteController::class, 'editar']);

Route::post('cliente/nome',[ClienteController::class,'pesquisarPorNome']);
Route::get('cliente/find/cep/{cep}',[ClienteController::class,'pesquisarPorCep']);

Route::get('cliente/find/email/{email}',[ClienteController::class,'pesquisarPorEmail']);

Route::get('cliente/find/celular/{celular}',[ClienteController::class,'pesquisarPorCelular']);

Route::get('cliente/find/cpf/{cpf}',[ClienteController::class,'pesquisarPorCPF']);

Route::put('cliente/senha',[ClienteController::class,'recuperarSenha']);
Route::get('cliente/retornarTodos',[ClienteController::class,'retornarTodos']);


//Profisionais


Route::post('profissional/store',[ProfissionalController::class, 'store']);

Route::delete('profissional/delete/{id}', [ProfissionalController::class, 'delete']);

Route::put('profissional/update', [ProfissionalController::class, 'editar']);

Route::get('profissionais/find/{id}',[ProfissionalController::class,'pesquisarPorId']);

Route::post('profissional/nome',[ProfissionalController::class,'pesquisarPorNome']);

Route::get('profissional/find/cep/{cep}',[ProfissionalController::class,'pesquisarPorCep']);

Route::get('profissional/find/email/{email}',[ProfissionalController::class,'pesquisarPorEmail']);

Route::get('profissional/find/celular/{celular}',[ProfissionalController::class,'pesquisarPorCelular']);

Route::get('profissional/find/cpf/{cpf}',[ProfissionalController::class,'pesquisarPorCPF']);

Route::put('profissional/senha',[ProfissionalController::class,'recuperarSenha']);
Route::get('profissional/all',[ProfissionalController::class,'retornarTodos']);

Route::get('profissional/retornarTodos',[ProfissionalController::class,'retornarTodos']);


//agendas
Route::get('agenda/find/{id}',[AgendaController::class,'pesquisarPorId']);
Route::post('agenda/store',[AgendaController::class, 'store']);

Route::delete('agenda/delete/{id}', [AgendaController::class, 'delete']);

Route::put('agenda/update', [AgendaController::class, 'editar']);

Route::post('agenda/nome',[AgendaController::class,'pesquisarPorNome']);

Route::get('agenda/all',[AgendaController::class,'retornarTodos']);






