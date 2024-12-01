<?php
//Ruta de referencia
namespace App\Models;

//
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    //Definimos que la tabla es dela base de datos
    protected $tableName = "comentarios";    

    //Definir el primary key de la tabla
    protected $primaryKey = "id";

    //Deshabilitar los campos de created_at y update_at
    public $timestamps = false;

    //Definir las demás columnas que tenemos en la tabla
    protected $fillable = ['nombre', 'descripcion', 'imagen'];


}
