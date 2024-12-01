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

                <h1 class="pt-5"><a href="formulario_enemigo">Agregar enemigo</a></h1>
                <h1 class="py-5 pixelify-sans">Listado enemigos</h1>

            </div>

            <div class="row container">

                <div class="table-responsive px-5 mx-5">

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
                            @foreach($Enemigos as $enemigo)
                            <tr>
                                <td>{{ $enemigo['id'] }}</td>
                                <td>{{ $enemigo['nombre'] }}</td>
                                <td>{{ $enemigo['descripcion'] }}</td>
                                <td><img class="w-50" src="/imagenes_enemigos/{{ $enemigo['imagen'] }}"></td>
                                <td>
                                    <a href="formulario_enemigo/{{$enemigo['id']}}">Editar</a>
                                    <a href="eliminar_enemigo/{{$enemigo['id']}}">Eliminar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>


        </div>

    </section>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top bg-black">
        <div class="col-md-4 d-flex align-items-center pixelify-sans" bis_skin_checked="1">
            <a href="#section-video" class="mb-3 me-2 mb-md-0 text-decoration-none lh-1">
                <img src="images/log_final_final.png" height="50px">
                <!--<svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>-->
            </a>
            <span class="mb-3 mb-md-0 text-white fs-5">2024 | Beyond The Stars.</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="4"><a target="_blank" href="https://youtube.com/@beyondthestars-p2w?si=aaYhsw5yu8jZN8QD"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white" class="bi bi-youtube" viewBox="0 0 16 16">
                        <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" />
                    </svg>
                </a></li>
            <li class="ms-4"><a target="_blank" href="https://www.instagram.com/beyondthestarsvg?igsh=MWNmamZ6M3oyZmpoNg=="><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                    </svg></a></li>
            <li class="ms-4"><a target="_blank" href="https://www.facebook.com/share/nzq7MwxDefRsQFN6/?mibextid=qi2Omg"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                    </svg></a></li>
        </ul>
    </footer>

</body>

</html>