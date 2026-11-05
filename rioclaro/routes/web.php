<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\AuditoriaController;
use App\Http\Controllers\MovimientoInventarioController;
use App\Http\Controllers\AgenteController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
});

//Route::get('/dashboard', function () {
    //return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('proveedores')->group(function () {
        Route::resource('proveedores',ProveedorController::class);
    });
    Route::prefix('productos')->group(function () {
        Route::resource('productos',ProductoController::class);
        Route::get('/{producto}',[ProductoController::class, 'show'])->name('productos.show');
    });
    Route::prefix('facturas')->group(function () {
        Route::resource('facturas',FacturaController::class);
        Route::post('/confirmar',[FacturaController::class, 'confirmar'])->name('facturas.confirmar');

    });
    Route::prefix('auditoria')->group(function () {
        Route::get('/',[AuditoriaController::class, 'index'])->name('auditoria.index');
    });
    Route::prefix('movimientos')->group(function () {
        Route::resource('movimientos',MovimientoInventarioController::class);
        
    });
    Route::prefix('agente')->group(function () {
        Route::get('/',[AgenteController::class,'index'])->name('agente.index');
        Route::post('/preguntar',[AgenteController::class,'preguntar'])->name('agente.preguntar'); 
        Route::get('/voz',[AgenteController::class, 'voz'])->name('agente.voz');
        Route::post('/api',[AgenteController::class, 'preguntarApi'])->name('agente.api');
    });
});

require __DIR__.'/auth.php';
