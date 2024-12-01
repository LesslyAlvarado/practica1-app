<?php
//Definir el path para hacer la referencia
namespace App\Http\Controllers;
//Agregar la referencia del modelo
use App\Models\Personaje;
 
//Agregamos la referencia del request
use Illuminate\Http\Request;

//Agregamos la referencia del Storage
use Illuminate\Support\Facades\Storage;
 
//NombreDelArchivo extiende de Controller
class PersonajeController extends Controller
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
        $Personajes = Personaje::all();
        return view('listado_personaje',["Personajes"=>$Personajes]);
    }

    //Agregamos un parámetro
    public function getForm($id = null)
    {
        //Validar si estan enviando el id
        if ($id == null) 
        {
            //Generamos una instancia nueva
            $Personaje = new Personaje();
        }
        else 
        {
            //Ejecutamos el método find para busca por el pk
            //SELECT * FROM Personajes WHERE id=3
            $Personaje = Personaje::find($id);
        }

        return view("formulario_personaje", $Personaje);
    }

    //Agregamos un parámetro
    public function getDelete($id)
    {
        //Se consulta el Personaje con base al parámetro de id
        //Se usa el método find
        //SELECT * FROM Personajes WHERE id=1
        $Personaje = Personaje::find($id);
        //Se borra la imagen
        if (!empty($Personaje->imagen)) {
            Storage::delete(public_path('imagenes_personajes').'/'.$Personaje->imagen);
        }
        //Ejecutamos el método para eliminar
        //DELETE FROM Personajes WHERE id=1
        $Personaje->delete();
        //Redirigimoa la listado
        return redirect('listado_personaje');

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
            $Personaje = new Personaje();
        } 
        else
        {
            $Personaje = Personaje::find($data['id']);
            //Valido si van a modificar la imagen y si tengo una imagen en la base de datos
            if ($request->hasFile('imagen') && $Personaje->imagen != null) {
                //Eliminar la imagen que se tiene en ka base de datos
                Storage::delete(public_path('imagenes_Personajes').'/'.$Personaje->imagen);
            }

        }

        //Generamos un nombre aleatorio y concatenamos la estensión de la imagen
        if($request->hasFile('imagen'))
        {
            $nombreImagen = time().'.'.$request->imagen->extension();
            //Movemos el archivo a la carpeta única
            $request->imagen->move(public_path('imagenes_Personajes'), $nombreImagen);
            //Asignamos el nombre del archivo
            $ruta_archivo_original = $nombreImagen;
        }

        //Se asignan los parámetros de la petición del objeto
        $Personaje->nombre = $data['nombre'];
        $Personaje->descripcion = $data['descripcion'];

        if($request->hasFile('imagen')) {
            $Personaje->imagen = $ruta_archivo_original;
        }

        $Personaje->save();
        return redirect('/listado_personaje');
    }

    //APIIIIIISSSSSSSSSS

    public function getAPIAll()
    {
        //Se usa el método all para obtener todos los usuarios
        //"SELECT * FROM usuarios"
        $Personajes = Personaje::all();
        //Ya no devuelve view, sino un arreglo, porque eso es un JSON, un arreglo
        return ["Personajes" => $Personajes];
    }

    public function getAPIGetPersonajeByID($id = null)
    {
        //Ejecutamos el metodo find para que busque el id
        $Personaje = Personaje::find($id);
        return $Personaje;
    }

    public function deleteAPI($id)
    {
        //Se consulta el usuario con base al parámetro de id
        //Se usa el método find
        //SELECT * FROM usuarios WHERE id=1
        $Personaje = Personaje::find($id);
        //Se borra la imagen
        if (!empty($Personaje->imagen)) {
            Storage::delete(public_path('imagenes_usuarios') . '/' . $Personaje->imagen);
        }
        //Ejecutamos el método para eliminar
        //DELETE FROM usuarios WHERE id=1
        $Personaje->delete();
    }

    public function postApiAddPersonaje(Request $request)
    {
        //Obtenemos los parámetros que nos manda la petición
        $data = $request->all();

        //Establecemos un nombre de la imagen
        $ruta_archivo_original = null;

        //Instanciamos un objeto usuario
        $Personaje = new Personaje();

        //Generamos un nombre aleatorio y concatenamos la estensión de la imagen
        if ($request->hasFile('imagen')) {
            $nombreImagen = time() . '.' . $request->imagen->extension();
            //Movemos el archivo a la carpeta única
            $request->imagen->move(public_path('imagenes_Personajes'), $nombreImagen);
            //Asignamos el nombre del archivo
            $ruta_archivo_original = $nombreImagen;
        }

        //Se asignan los parámetros de la petición del objeto
        $Personaje->nombre = $data['nombre'];
        $Personaje->descripcion = $data['descripcion'];

        if ($request->hasFile('imagen')) {
            $Personaje->imagen = $ruta_archivo_original;
        }

        $Personaje->save();
    }

    public function putApiUpdatePersonaje($id, Request $request)
    {
        //Obtenemos los parámetros que nos manda la petición
        $data = $request->all();

        //Establecemos un nombre de la imagen
        $ruta_archivo_original = null;

        //Instanciamos un objeto usuario
        $Personaje = Personaje::find($id);

        //Validamos si la imagen se está enviando
        if ($request->hasFile('imagen')) {
            //Valido si van a modificar la imagen y si tengo una imagen en la base de datos
            if ($Personaje->imagen != null) {
                //Eliminar la imagen que se tiene en base de datos 
                Storage::delete(public_path('imagenes_Personajes') . '/' . $Personaje->imagen);
            }
            //Generamos un nombre aliatorio y concatenamos la extension de la imagen
            $nombreImagen = time() . '.' . $request->imagen->extension();
            //Movemos el archivo a la carpeta publica con el nombre
            $request->imagen->move(public_path('imagenes_Personajes'), $nombreImagen);
            //Asignamos el nombre del archivo
            $ruta_archivo_original = $nombreImagen;
        }
        //se asignan los parametros de la peticion a objeto
        $Personaje->nombre = $data['nombre'];
        $Personaje->descripcion = $data['descripcion'];

        if ($request->hasFile('imagen')) {
            $Personaje->imagen = $ruta_archivo_original;
        }

        //Se ejecuta el metodo save para agregar o modificar el registro
        $Personaje->save();
    }

    public function getAPIAllFiltro(Request $request)
    {
        //
        $data = $request->all();
        $filtro = $request->input("filtro");
        //Se usa el método all para obtener todos los usuarios
        //"SELECT * FROM usuarios"
        $Personajes = Personaje::Where('nombre', 'like', "%$filtro%")->get();
        //Ya no devuelve view, sino un arreglo, porque eso es un JSON, un arreglo
        return ["Personajes" => $Personajes];
    }
    
}

?>