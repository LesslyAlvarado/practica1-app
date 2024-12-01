<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonajeController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/usuario', function(Request $request){
    //Devuelve un formato JSON
    return "Usuario:Javier";
});

Route::get('/listado_personaje', [PersonajeController::class, 'getAPIAll']);
//http://127.0.0.1:8000/api/listado_usuario

Route::get('/get_personaje/{id}', [PersonajeController::class, 'getAPIGetPersonajeByID']);

Route::delete('/delete_personaje/{id}', [PersonajeController::class, 'deleteAPI']);

Route::post('/add_personaje', [PersonajeController::class, 'postApiAddPersonaje']);

Route::put('/update_personaje/{id}', [PersonajeController::class, 'putApiUpdatePersonaje']);

Route::post('/search_personaje', [PersonajeController::class, 'getAPIAllFiltro']);