<?php

use App\Http\Controllers\ImovelController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\TipoImovelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('imoveis.index');
});


// CLIENTES
Route::get('clientes', [ClienteController::class,'index'])->name('clientes.index');
Route::get('clientes/cadastrar', [ClienteController::class,'create'])->name('clientes.create');
Route::post('clientes/cadastrar', [ClienteController::class,'store'])->name('clientes.store');
Route::get('clientes/editar/{cliente}', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
Route::get('clientes/excluir/{cliente}', [ClienteController::class,'delete'])->name('clientes.delete');
Route::delete('clientes/{cliente}', [ClienteController::class,'destroy'])->name('clientes.destroy');
Route::get('clientes/{cliente}', [ClienteController::class,'show'])->name('clientes.show');


// IMÓVEIS
Route::get('imoveis', [ImovelController::class,'index'])->name('imoveis.index');
Route::get('imoveis/cadastrar', [ImovelController::class,'create'])->name('imoveis.create');
Route::post('imoveis/cadastrar', [ImovelController::class,'store'])->name('imoveis.store');
Route::get('imoveis/editar/{imovel}', [ImovelController::class, 'edit'])->name('imoveis.edit');
Route::put('imoveis/{imovel}', [ImovelController::class, 'update'])->name('imoveis.update');
Route::get('imoveis/excluir/{imovel}', [ImovelController::class,'delete'])->name('imoveis.delete');
Route::delete('imoveis/{imovel}', [ImovelController::class,'destroy'])->name('imoveis.destroy');
Route::get('imoveis/{imovel}', [ImovelController::class,'show'])->name('imoveis.show');


// CONTRATOS
Route::get('contratos', [ContratoController::class,'index'])->name('contratos.index');
Route::get('contratos/cadastrar', [ContratoController::class,'create'])->name('contratos.create');
Route::post('contratos/cadastrar', [ContratoController::class,'store'])->name('contratos.store');
Route::get('contratos/editar/{contrato}', [ContratoController::class, 'edit'])->name('contratos.edit');
Route::put('contratos/{contrato}', [ContratoController::class, 'update'])->name('contratos.update');
Route::get('contratos/excluir/{contrato}', [ContratoController::class,'delete'])->name('contratos.delete');
Route::delete('contratos/{contrato}', [ContratoController::class,'destroy'])->name('contratos.destroy');
Route::get('contratos/{contrato}', [ContratoController::class,'show'])->name('contratos.show');


// TIPOS DE IMÓVEL
Route::get('tipos', [TipoImovelController::class,'index'])->name('tipos.index');
Route::get('tipos/cadastrar', [TipoImovelController::class,'create'])->name('tipos.create');
Route::post('tipos/cadastrar', [TipoImovelController::class,'store'])->name('tipos.store');
Route::get('tipos/editar/{tipo}', [TipoImovelController::class, 'edit'])->name('tipos.edit');
Route::put('tipos/{tipo}', [TipoImovelController::class, 'update'])->name('tipos.update');
Route::get('tipos/excluir/{tipo}', [TipoImovelController::class,'delete'])->name('tipos.delete');
Route::delete('tipos/{tipo}', [TipoImovelController::class,'destroy'])->name('tipos.destroy');
Route::get('tipos/{tipo}', [TipoImovelController::class,'show'])->name('tipos.show');
