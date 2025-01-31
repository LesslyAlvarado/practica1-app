<?php
//Definir el path para hacer la referencia
namespace App\Http\Controllers;
//Agregar la referencia del modelo
use App\Models\Merch;
 
//Agregamos la referencia del request
use Illuminate\Http\Request;

//Agregamos la referencia del Storage
use Illuminate\Support\Facades\Storage;
 
//NombreDelArchivo extiende de Controller
class MerchController extends Controller
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
        $Merchs = Merch::all();
        return view('listado_merch',["Merchs"=>$Merchs]);
    }

    //Agregamos un parámetro
    public function getForm($id = null)
    {
        //Validar si estan enviando el id
        if ($id == null) 
        {
            //Generamos una instancia nueva
            $Merch = new Merch();
        }
        else 
        {
            //Ejecutamos el método find para busca por el pk
            //SELECT * FROM Personajes WHERE id=3
            $Merch = Merch::find($id);
        }

        return view("formulario_merch", $Merch);
    }

    //Agregamos un parámetro
    public function getDelete($id)
    {
        //Se consulta el Personaje con base al parámetro de id
        //Se usa el método find
        //SELECT * FROM Personajes WHERE id=1
        $Merch = Merch::find($id);
        //Se borra la imagen
        if (!empty($Merch->imagen)) {
            Storage::delete(public_path('imagenes_merchs').'/'.$Merch->imagen);
        }
        //Ejecutamos el método para eliminar
        //DELETE FROM Personajes WHERE id=1
        $Merch->delete();
        //Redirigimoa la listado
        return redirect('listado_merch');

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
            $Merch = new Merch();
        } 
        else
        {
            $Merch = Merch::find($data['id']);
            //Valido si van a modificar la imagen y si tengo una imagen en la base de datos
            if ($request->hasFile('imagen') && $Merch->imagen != null) {
                //Eliminar la imagen que se tiene en ka base de datos
                Storage::delete(public_path('imagenes_merchs').'/'.$Merch->imagen);
            }

        }

        //Generamos un nombre aleatorio y concatenamos la estensión de la imagen
        if($request->hasFile('imagen'))
        {
            $nombreImagen = time().'.'.$request->imagen->extension();
            //Movemos el archivo a la carpeta única
            $request->imagen->move(public_path('imagenes_merchs'), $nombreImagen);
            //Asignamos el nombre del archivo
            $ruta_archivo_original = $nombreImagen;
        }

        //Se asignan los parámetros de la petición del objeto
        $Merch->nombre = $data['nombre'];
        $Merch->descripcion = $data['descripcion'];

        if($request->hasFile('imagen')) {
            $Merch->imagen = $ruta_archivo_original;
        }

        $Merch->save();
        return redirect('/listado_merch');
    }
    
}

?>