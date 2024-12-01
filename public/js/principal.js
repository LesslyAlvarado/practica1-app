let NombreAnimacion = document.getElementById('NombreAnimacion');

let typewriter = new Typewriter(NombreAnimacion, { loop: true });

typewriter.typeString('¿Listo para una aventura espacial?')
    .pauseFor(500)
    .deleteAll()
    .typeString('BEYOND THE STARS')
    .pauseFor(500)
    .deleteAll()
    .start();

