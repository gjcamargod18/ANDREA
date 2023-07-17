<?php

use App\Http\Controllers\AmbientesController;
use App\Http\Controllers\LlavesController;
use App\Http\Controllers\PrestamosController;
use App\Http\Controllers\UserController;
use App\Models\Prestamos;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/usuarios/register',[UserController::class, 'createUser'])->name('create');
Route::post('/ambientes/crear',[AmbientesController::class, 'crearAmbiente'])->name('crear-ambiente');
Route::post('/llaves/crear',[LlavesController::class, 'crearLLave'])->name('crear-llave');
Route::post('/prestamos/crear',[PrestamosController::class, 'crearPrestamo'])->name('crear-prestamo');

Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios');
Route::get('/ambientes', [AmbientesController::class, 'index'])->name('ambientes');
Route::get('/llaves', [LlavesController::class, 'index'])->name('llaves');
Route::get('/prestamos', [PrestamosController::class, 'index'])->name('prestamos');
Route::get('/prestamos/instructor', [PrestamosController::class, 'mostrarPrestamosInstructor'])->name('prestamos_instructor');

Route::delete('/usuarios/borrar/{user}', [UserController::class, 'borrarUser'])->name('borrar');
Route::delete('/ambientes/borrar/{ambiente}', [AmbientesController::class, 'borrarAmbiente'])->name('borrar-ambiente');
Route::delete('/llaves/borrar/{llave}', [LlavesController::class, 'borrarLlave'])->name('borrar-llave');

Route::patch('/usuarios/actualizar',[UserController::class, 'actualizarUser'])->name('actualizar');
Route::patch('/ambientes/actualizar',[AmbientesController::class, 'ActualizarAmbiente'])->name('actualizar-ambiente');
Route::patch('/llaves/actualizar',[LLavesController::class, 'actualizarLLave'])->name('actualizar-llave');
Route::patch('/prestamos/cerrar/{llave}',[PrestamosController::class, 'cerrarPrestamo'])->name('cerrar-prestamos');
Route::patch('/prestamos/devolver/{llave}',[PrestamosController::class, 'devolver'])->name('devolver-llave');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


