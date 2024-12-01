<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/guardar_usuario" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{empty($id) ? '' : $id}}">
        <label>Nombre:</label>
        <br>
        <input type="text" name="nombre" value="{{empty($nombre) ? '' : $nombre}}">
        <br>
        <label>Edad:</label>
        <br>
        <input type="text" name="edad" value="{{empty($edad) ? '' : $edad}}">
        <br>
        <label>Imagen:</label>
        <br>
        <input type="file" name="imagen" value="{{empty($imagen) ? '' : $imagen}}">
        <br>
        <button type="submit">{{ empty($id) ? 'Agregar' : 'Modificar'}}</button>
        <a href="/listado_usuario">Cancelar</a>
    </form>
</body>
</html>