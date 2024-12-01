<?php
//Referencia de carpeta o (path)
namespace App\Http\Controllers;

//Agregamos la referencia del modelo
use App\Models\Usuario;
use App\Models\Personaje;
use App\Models\Enemigo;
use App\Models\Powerup;
use App\Models\Merch;
use App\Models\Comentario;
use App\Models\Plataforma;

//    NombreTablaController
class BeyondController extends Controller {

    public function getListado() {
        //Se usa el metodo all para obtener todos los usuarios
        //"SELECT * FROM usuarios"
        $Personajes = Personaje::all();
        $Enemigos = Enemigo::all();
        $Powerups = Powerup::all();
        $Merchs = Merch::all();
        $Comentarios = Comentario::all();
        $Plataformas = Plataforma::all();
        return view("BeyondTheStars",[
            "Personajes" => $Personajes,
            "Enemigos" => $Enemigos,
            "Powerups" => $Powerups,
            "Merchs" => $Merchs,
            "Comentarios" => $Comentarios,
            "Plataformas" => $Plataformas
    ]);
    }
}
