<?php
//Definir el path para hacer la referencia
namespace App\Http\Controllers;
//Agregar la referencia del modelo
use App\Models\Enemigo;
 
//Agregamos la referencia del request
use Illuminate\Http\Request;

//Agregamos la referencia del Storage
use Illuminate\Support\Facades\Storage;
 
//NombreDelArchivo extiende de Controller
class EnemigoController extends Controller
{

    //Generamos una función que invoca la vista
    public function index()
    {
        //Información de un registro
        $datos = ["id"=>1, "Nombre"=>"Luis"];
        //Se devuelve una vista, con los datos de un registro
        return view('principal', $datos);
    }

    public function getAll()
    {   
        //Se usa el método all para obtener todos los Personajes
        //"SELECT * FROM Personajes"
        $Enemigos = Enemigo::all();
        return view('listado_enemigo',["Enemigos"=>$Enemigos]);
    }

    //Agregamos un parámetro
    public function getForm($id = null)
    {
        //Validar si estan enviando el id
        if ($id == null) 
        {
            //Generamos una instancia nueva
            $Enemigo = new Enemigo();
        }
        else 
        {
            //Ejecutamos el método find para busca por el pk
            //SELECT * FROM Personajes WHERE id=3
            $Enemigo = Enemigo::find($id);
        }

        return view("formulario_enemigo", $Enemigo);
    }

    //Agregamos un parámetro
    public function getDelete($id)
    {
        //Se consulta el Personaje con base al parámetro de id
        //Se usa el método find
        //SELECT * FROM Personajes WHERE id=1
        $Enemigo = Enemigo::find($id);
        //Se borra la imagen
        if (!empty($Enemigo->imagen)) {
            Storage::delete(public_path('imagenes_enemigos').'/'.$Enemigo->imagen);
        }
        //Ejecutamos el método para eliminar
        //DELETE FROM Personajes WHERE id=1
        $Enemigo->delete();
        //Redirigimoa la listado
        return redirect('listado_enemigo');

    }

    //Agregamos un parámetro Request que encapsula los parámetros
    //Agregamosun parámetro opcional
    public function saveData(Request $request)
    {
        //Obtenemos los parámetros que nos manda la petición
        $data = $request->all();

        //Establecemos un nombre de la imagen
        $ruta_archivo_original = null;

        //Validar el id si lo estamos mandando
        if ($data["id"] == null) {
            //Se genera un Personaje nuevo
            $Enemigo = new Enemigo();
        } 
        else
        {
            $Enemigo = Enemigo::find($data['id']);
            //Valido si van a modificar la imagen y si tengo una imagen en la base de datos
            if ($request->hasFile('imagen') && $Enemigo->imagen != null) {
                //Eliminar la imagen que se tiene en ka base de datos
                Storage::delete(public_path('imagenes_enemigos').'/'.$Enemigo->imagen);
            }

        }

        //Generamos un nombre aleatorio y concatenamos la estensión de la imagen
        if($request->hasFile('imagen'))
        {
            $nombreImagen = time().'.'.$request->imagen->extension();
            //Movemos el archivo a la carpeta única
            $request->imagen->move(public_path('imagenes_enemigos'), $nombreImagen);
            //Asignamos el nombre del archivo
            $ruta_archivo_original = $nombreImagen;
        }

        //Se asignan los parámetros de la petición del objeto
        $Enemigo->nombre = $data['nombre'];
        $Enemigo->descripcion = $data['descripcion'];

        if($request->hasFile('imagen')) {
            $Enemigo->imagen = $ruta_archivo_original;
        }

        $Enemigo->save();
        return redirect('/listado_enemigo');
    }
    
}

?>