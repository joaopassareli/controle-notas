<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmpenhosController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\ContratosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MelhoriasController;
use App\Http\Controllers\SecretariasController;
use App\Http\Controllers\NotasFiscaisController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('login', [LoginController::class, 'index'])->name('login_index');
Route::post('login', [LoginController::class, 'entrar']);

Route::get('home', [HomeController::class, 'index'])->name('home_index');


Route::get('empresas', [EmpresasController::class, 'index'])->name('listar_empresas');
Route::get('empresas/criar',[EmpresasController::class, 'create'])->name('cadastrar_empresa');
Route::post('empresas/criar',[EmpresasController::class, 'store']);
Route::delete('empresas/{id}', [EmpresasController::class, 'destroy'])->name('remover_serie');
Route::post('empresas/{id}/editaNome', [EmpresasController::class, 'editaNome']);


Route::get('notas', [NotasFiscaisController::class, 'index'])->name('listar_notas');
Route::get('notas/criar', [NotasFiscaisController::class, 'create'])->name('cadastrar_notas');
Route::post('notas/criar', [NotasFiscaisController::class, 'store']);
Route::delete('notas/{id}', [NotasFiscaisController::class, 'destroy'])->name('remover_notas');


Route::get('secretarias', [SecretariasController::class, 'index'])->name('listar_secretarias');
Route::get('secretarias/criar', [SecretariasController::class, 'create'])->name('cadastrar_secretarias');
Route::post('secretarias/criar', [SecretariasController::class, 'store']);
Route::delete('secretarias/{id}', [SecretariasController::class, 'destroy'])->name('remover_secretaria');
Route::post('secretarias/{id}/editaNome', [SecretariasController::class, 'editaNome']);


Route::get('contratos', [ContratosController::class, 'index'])->name('listar_contratos');
Route::get('contratos/criar', [ContratosController::class, 'create'])->name('cadastrar_contratos');
Route::post('contratos/criar', [ContratosController::class, 'store']);
Route::delete('contratos/{id}', [ContratosController::class, 'destroy'])->name('remover_contrato');


Route::get('empenhos', [EmpenhosController::class, 'index'])->name('listar_empenhos');
Route::get('empenhos/criar', [EmpenhosController::class, 'create'])->name('cadastrar_empenhos');
Route::post('empenhos/criar', [EmpenhosController::class, 'store']);
Route::delete('empenhos/{id}', [EmpenhosController::class, 'destroy'])->name('remover_empenho');


Route::get('melhorias', [MelhoriasController::class, 'index'])->name('listar_melhorias');