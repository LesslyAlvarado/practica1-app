<?php

use Illuminate\Support\Facades\Route;
//Agregar la referencia del Controller
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PersonajeController;
use App\Http\Controllers\EnemigoController;
use App\Http\Controllers\PowerupController;
use App\Http\Controllers\MerchController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\PlataformaController;
use App\Http\Controllers\BeyondController;

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
//Genero un método que mande a ejecutar el index de
//Clase Controller
Route::get('/', [UsuarioController::class, 'index']);

Route::get('/listado_usuario', [UsuarioController::class, 'getAll']);

Route::get('/formulario_usuario', [UsuarioController::class, 'getForm']);

Route::get('/formulario_usuario/{id}', [UsuarioController::class, 'getForm']);

Route::get('/eliminar_usuario/{id}', [UsuarioController::class, 'getDelete']);

Route::post('guardar_usuario', [UsuarioController::class, 'saveData']);

Route::post('guardar_usuario/{id}', [UsuarioController::class, 'saveData']);

Route::get("/hola", function () {
    return view("BeyondTheStars");
});

//Hay que hacer cada uno de los Controllers y vincularlos para los diferentes catálogos

Route::get('/listado_personaje', [PersonajeController::class, 'getAll']);

Route::get('/formulario_personaje', [PersonajeController::class, 'getForm']);

Route::get('/formulario_personaje/{id}', [PersonajeController::class, 'getForm']);

Route::get('/eliminar_personaje/{id}', [PersonajeController::class, 'getDelete']);

Route::post('guardar_personaje', [PersonajeController::class, 'saveData']);

Route::post('guardar_personaje/{id}', [PersonajeController::class, 'saveData']);

//Enemigos
Route::get('/listado_enemigo', [EnemigoController::class, 'getAll']);

Route::get('/formulario_enemigo', [EnemigoController::class, 'getForm']);

Route::get('/formulario_enemigo/{id}', [EnemigoController::class, 'getForm']);

Route::get('/eliminar_enemigo/{id}', [EnemigoController::class, 'getDelete']);

Route::post('guardar_enemigo', [EnemigoController::class, 'saveData']);

Route::post('guardar_enemigo/{id}', [EnemigoController::class, 'saveData']);

//Power Ups
Route::get('/listado_powerup', [PowerupController::class, 'getAll']);

Route::get('/formulario_powerup', [PowerupController::class, 'getForm']);

Route::get('/formulario_powerup/{id}', [PowerupController::class, 'getForm']);

Route::get('/eliminar_powerup/{id}', [PowerupController::class, 'getDelete']);

Route::post('guardar_powerup', [PowerupController::class, 'saveData']);

Route::post('guardar_powerup/{id}', [PowerupController::class, 'saveData']);

//Merch
Route::get('/listado_merch', [MerchController::class, 'getAll']);

Route::get('/formulario_merch', [MerchController::class, 'getForm']);

Route::get('/formulario_merch/{id}', [MerchController::class, 'getForm']);

Route::get('/eliminar_merch/{id}', [MerchController::class, 'getDelete']);

Route::post('guardar_merch', [MerchController::class, 'saveData']);

Route::post('guardar_merch/{id}', [MerchController::class, 'saveData']);

//Comentarios
Route::get('/listado_comentario', [ComentarioController::class, 'getAll']);

Route::get('/formulario_comentario', [ComentarioController::class, 'getForm']);

Route::get('/formulario_comentario/{id}', [ComentarioController::class, 'getForm']);

Route::get('/eliminar_comentario/{id}', [ComentarioController::class, 'getDelete']);

Route::post('guardar_comentario', [ComentarioController::class, 'saveData']);

Route::post('guardar_comentario/{id}', [ComentarioController::class, 'saveData']);

//Plataformas

Route::get('/listado_plataforma', [PlataformaController::class, 'getAll']);

Route::get('/formulario_plataforma', [PlataformaController::class, 'getForm']);

Route::get('/formulario_plataforma/{id}', [PlataformaController::class, 'getForm']);

Route::get('/eliminar_plataforma/{id}', [PlataformaController::class, 'getDelete']);

Route::post('guardar_plataforma', [PlataformaController::class, 'saveData']);

Route::post('guardar_plataforma/{id}', [PlataformaController::class, 'saveData']);

//
Route::get(
    "/",
    [
        BeyondController::class,
        "getListado"
    ]);
    