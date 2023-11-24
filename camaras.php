<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cámaras y Accesos</title>
    <link rel="stylesheet" href="tu_estilo.css"> <!-- Enlaza tu hoja de estilos personalizada -->
    <style>
        /* Estilos para el contenedor principal */
        body {
            background-color: #555; /* Color de fondo similar al del navbar */
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 20px;
            box-sizing: border-box;
            margin: 0;
        }

        /* Estilos para cada video */
        .video-container {
            width: calc(33.33% - 20px); /* Ancho para tres videos por fila con espaciado */
            margin: 10px;
            text-align: center;
            color: white;
            background-color: #333; /* Color de fondo para cada video */
            padding: 20px;
            box-sizing: border-box;
        }

        .video-container iframe {
            width: 100%; /* Ajustar el tamaño del video */
            height: 200px;
        }

        .video-container h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <!-- Video 1 -->
    <div class="video-container">
        <h3>Cámara 1</h3>
        <iframe width="300" height="200" src="https://www.cameraftp.com/Camera/CameraPlayer.aspx/parentID257457417/shareID14081667/isEmbeddedtrue/AmCrestOutDoorCamera?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
    <!-- Repetir este bloque para cada uno de los otros 5 videos -->
    <!-- Video 2 -->
    <div class="video-container">
        <h3>Cámara 2</h3>
        <iframe width="300" height="200" src="https://www.youtube.com/embed/SECVGN4Bsgg?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
    <!-- Video 3 -->
    <div class="video-container">
        <h3>Cámara 3</h3>
        <iframe width="300" height="200" src="https://www.youtube.com/embed/SECVGN4Bsgg?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
    <!-- Video 4 -->
    <div class="video-container">
        <h3>Cámara 4</h3>
        <iframe width="300" height="200" src="https://www.youtube.com/embed/SECVGN4Bsgg?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
    <!-- Video 5 -->
    <div class="video-container">
        <h3>Cámara 5</h3>
        <iframe width="300" height="200" src="https://www.youtube.com/embed/SECVGN4Bsgg?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
    <!-- Video 6 -->
    <div class="video-container">
        <h3>Cámara 6</h3>
        <iframe width="300" height="200" src="https://www.youtube.com/embed/SECVGN4Bsgg?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
</body>
</html>

