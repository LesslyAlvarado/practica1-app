<?php
//Definir el path para hacer la referencia
namespace App\Http\Controllers;
//Agregar la referencia del modelo
use App\Models\Usuario;
use Illuminate\Contracts\Cache\Store;
//Agregamos la referencia del request
use Illuminate\Http\Request;

//Agregamos la referencia del Storage
use Illuminate\Support\Facades\Storage;

//NombreDelArchivo extiende de Controller
class UsuarioController extends Controller
{

    //Generamos una función que invoca la vista
    public function index()
    {
        //Información de un registro
        $datos = ["id" => 1, "Nombre" => "Luis"];
        //Se devuelve una vista, con los datos de un registro
        return view('BeyondTheStars', $datos);
    }

    public function getAll()
    {
        //Se usa el método all para obtener todos los usuarios
        //"SELECT * FROM usuarios"
        $usuarios = Usuario::all();
        return view('listado_usuario', ["usuarios" => $usuarios]);
    }

    //Agregamos un parámetro
    public function getForm($id = null)
    {
        //Validar si estan enviando el id
        if ($id == null) {
            //Generamos una instancia nueva
            $usuario = new Usuario();
        } else {
            //Ejecutamos el método find para busca por el pk
            //SELECT * FROM usuarios WHERE id=3
            $usuario = Usuario::find($id);
        }

        return view("formulario_usuario", $usuario);
    }

    //Agregamos un parámetro
    public function getDelete($id)
    {
        //Se consulta el usuario con base al parámetro de id
        //Se usa el método find
        //SELECT * FROM usuarios WHERE id=1
        $usuario = Usuario::find($id);
        //Se borra la imagen
        if (!empty($usuario->imagen)) {
            Storage::delete(public_path('imagenes_usuarios') . '/' . $usuario->imagen);
        }
        //Ejecutamos el método para eliminar
        //DELETE FROM usuarios WHERE id=1
        $usuario->delete();
        //Redirigimoa la listado
        return redirect('listado_usuario');
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
            //Se genera un usuario nuevo
            $usuario = new Usuario();
        } else {
            $usuario = Usuario::find($data['id']);
            //Valido si van a modificar la imagen y si tengo una imagen en la base de datos
            if ($request->hasFile('imagen') && $usuario->imagen != null) {
                //Eliminar la imagen que se tiene en ka base de datos
                Storage::delete(public_path('imagenes_usuarios') . '/' . $usuario->imagen);
            }
        }

        //Generamos un nombre aleatorio y concatenamos la estensión de la imagen
        if ($request->hasFile('imagen')) {
            $nombreImagen = time() . '.' . $request->imagen->extension();
            //Movemos el archivo a la carpeta única
            $request->imagen->move(public_path('imagenes_usuarios'), $nombreImagen);
            //Asignamos el nombre del archivo
            $ruta_archivo_original = $nombreImagen;
        }

        //Se asignan los parámetros de la petición del objeto
        $usuario->nombre = $data['nombre'];
        $usuario->edad = $data['edad'];

        if ($request->hasFile('imagen')) {
            $usuario->imagen = $ruta_archivo_original;
        }

        $usuario->save();
        return redirect('/listado_usuario');
    }


    //EJEMPLOS APIISSSSSSSS
    public function getAPIAll()
    {
        //Se usa el método all para obtener todos los usuarios
        //"SELECT * FROM usuarios"
        $usuarios = Usuario::all();
        //Ya no devuelve view, sino un arreglo, porque eso es un JSON, un arreglo
        return ["usuarios" => $usuarios];
    }

    public function getAPIGetUsuarioByID($id = null)
    {
        //Ejecutamos el metodo find para que busque el id
        $usuario = Usuario::find($id);
        return $usuario;
    }

    public function deleteAPI($id)
    {
        //Se consulta el usuario con base al parámetro de id
        //Se usa el método find
        //SELECT * FROM usuarios WHERE id=1
        $usuario = Usuario::find($id);
        //Se borra la imagen
        if (!empty($usuario->imagen)) {
            Storage::delete(public_path('imagenes_usuarios') . '/' . $usuario->imagen);
        }
        //Ejecutamos el método para eliminar
        //DELETE FROM usuarios WHERE id=1
        $usuario->delete();
    }

    public function postApiAddUsuario(Request $request)
    {
        //Obtenemos los parámetros que nos manda la petición
        $data = $request->all();

        //Establecemos un nombre de la imagen
        $ruta_archivo_original = null;

        //Instanciamos un objeto usuario
        $usuario = new Usuario();

        //Generamos un nombre aleatorio y concatenamos la estensión de la imagen
        if ($request->hasFile('imagen')) {
            $nombreImagen = time() . '.' . $request->imagen->extension();
            //Movemos el archivo a la carpeta única
            $request->imagen->move(public_path('imagenes_usuarios'), $nombreImagen);
            //Asignamos el nombre del archivo
            $ruta_archivo_original = $nombreImagen;
        }

        //Se asignan los parámetros de la petición del objeto
        $usuario->nombre = $data['nombre'];
        $usuario->edad = $data['edad'];

        if ($request->hasFile('imagen')) {
            $usuario->imagen = $ruta_archivo_original;
        }

        $usuario->save();
    }

    public function putApiUpdateUsuario($id, Request $request)
    {
        //Obtenemos los parámetros que nos manda la petición
        $data = $request->all();

        //Establecemos un nombre de la imagen
        $ruta_archivo_original = null;

        //Instanciamos un objeto usuario
        $usuario = Usuario::find($id);

        //Validamos si la imagen se está enviando
        if ($request->hasFile('imagen')) {
            //Valido si van a modificar la imagen y si tengo una imagen en la base de datos
            if ($usuario->imagen != null) {
                //Eliminar la imagen que se tiene en base de datos 
                Storage::delete(public_path('imagenes_usuarios') . '/' . $usuario->imagen);
            }
            //Generamos un nombre aliatorio y concatenamos la extension de la imagen
            $nombreImagen = time() . '.' . $request->imagen->extension();
            //Movemos el archivo a la carpeta publica con el nombre
            $request->imagen->move(public_path('imagenes_usuarios'), $nombreImagen);
            //Asignamos el nombre del archivo
            $ruta_archivo_original = $nombreImagen;
        }
        //se asignan los parametros de la peticion a objeto
        $usuario->nombre = $data['nombre'];
        $usuario->edad = $data['edad'];

        if ($request->hasFile('imagen')) {
            $usuario->imagen = $ruta_archivo_original;
        }

        //Se ejecuta el metodo save para agregar o modificar el registro
        $usuario->save();
    }
}
