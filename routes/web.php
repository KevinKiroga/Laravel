<?php

use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Ruta para la pantalla de inicio
Route::get('/', [UsuariosController::class, 'index'])->name('index');

// Ruta para guardar un nuevo usuario
Route::post('/usuarios', [UsuariosController::class, 'store'])->name('usuario.store');







