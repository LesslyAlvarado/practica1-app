<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><a href="formulario_usuario">Agregar usuario</a></h1>
    <h1>Listado Usuarios</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
    @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario['id'] }}</td>
            <td>{{ $usuario['nombre'] }}</td>
            <td><img src="/imagenes" alt=""></td>
            <td>
                <a href="formulario_usuario/{{$usuario['id']}}">Editar</a>
                <a href="eliminar_usuario/{{$usuario['id']}}">Eliminar</a>
            </td>
        </tr>
    @endforeach
        </tbody>
    </table>

</body>
</html>