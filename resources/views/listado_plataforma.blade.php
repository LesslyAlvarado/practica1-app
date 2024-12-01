<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/principal.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-black" style="--bs-bg-opacity: .9;">
        <div class="container-fluid" bis_skin_checked="1">
            <a class="navbar-brand" href="/"><img src="images/log_final_final.png" style="height: 50px;"></a>
            <!-- <button id="toggle-music" class="bg-black navbar-brand"><svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="white" class="bi bi-file-music-fill" viewBox="0 0 16 16">
        <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2m-.5 4.11v1.8l-2.5.5v5.09c0 .495-.301.883-.662 1.123C7.974 12.866 7.499 13 7 13s-.974-.134-1.338-.377C5.302 12.383 5 11.995 5 11.5s.301-.883.662-1.123C6.026 10.134 6.501 10 7 10c.356 0 .7.068 1 .196V4.41a1 1 0 0 1 .804-.98l1.5-.3a1 1 0 0 1 1.196.98"/>
      </svg></button> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse" bis_skin_checked="1">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active fs-5 pixelify-sans" aria-current="page" href="/listado_personaje">Personajes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-5 pixelify-sans" aria-current="page" href="/listado_enemigo">Enemigos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-5 pixelify-sans" aria-current="page" href="/listado_powerup">Power Ups</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-5 pixelify-sans" aria-current="page" href="/listado_merch">Merch</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-5 pixelify-sans" aria-current="page" href="/listado_comentario">Comentarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-5 pixelify-sans" aria-current="page" href="/listado_plataforma">Plataformas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <video autoplay muted loop id="bg-video" src="videos/videoFondo.mp4"></video>
    </section>

    <section>

        <div class="row container ">

            <div class="col-12 text-white pt-5 text-center">

                <h1 class="pt-5"><a href="formulario_plataforma">Agregar plataforma</a></h1>
                <h1 class="py-5 pixelify-sans">Listado plataformas</h1>

            </div>

            <div class="row container">

                <div class="col-12 px-5 mx-5">

                    <table class="table table-dark table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Plataformas as $plataforma)
                            <tr>
                                <td>{{ $plataforma['id'] }}</td>
                                <td>{{ $plataforma['nombre'] }}</td>
                                <td>{{ $plataforma['descripcion'] }}</td>
                                <td><img class="w-50" src="/imagenes_plataformas/{{ $plataforma['imagen'] }}"></td>
                                <td>
                                    <a href="formulario_plataforma/{{$plataforma['id']}}">Editar</a>
                                    <a href="eliminar_plataforma/{{$plataforma['id']}}">Eliminar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </section>

</body>

</html>