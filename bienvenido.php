<?php
session_start();

if (isset($_SESSION['usuario'])) {
    // Aquí va tu lógica de conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "seguridad";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener el nombre de usuario desde la sesión
    $usuarioActual = $_SESSION["usuario"];

    // Consulta SQL para obtener el permiso del usuario actual
    $sql = "SELECT Permiso FROM Usuarios WHERE usuario = '$usuarioActual'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $permisoUsuario = $row["Permiso"];

        // Verificar si el usuario tiene permiso para mostrar la opción de Usuarios
        $mostrarUsuarios = ($permisoUsuario == 1);
    } else {
        echo "No se encontraron resultados para el usuario actual.";
    }

    $conn->close();
} else {
    // Redirigir a la página de inicio de sesión si no hay sesión iniciada
    header("Location: login.php");
    exit(); // Asegura que el script se detenga después de la redirección
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        /* Estilos para la barra de navegación */
        .navbar {
            background: #555;
            height: 100vh;
            width: 100px;
            position: fixed;
            top: 0;
            left: 0;
            margin-top: 0; /* Eliminar el margen superior para que el navbar comience desde arriba */
        }

        /* Estilos para los elementos de la barra de navegación */
        .navbar a {
            display: block;
            color: white;
            text-align: center;
            padding: 20px 0;
            text-decoration: none;
            font-size: 18px;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Estilos para el contenido principal */
        .content {
            margin-left: 100px;
            padding: 20px;
            text-align: center;
            min-height: calc(100vh - 60px); /* Resta el espacio ocupado por el pie de página */
        }

        /* Estilos para el pie de página */
        .footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: absolute;
            width: 100%;
            bottom: 0;
        }

        /* Estilos para los cuadros de visión y misión */
        .vision-mission-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .vision-mission-box {
            border: 2px solid #ccc;
            padding: 20px;
            margin: 10px;
            text-align: center;
        }

        .vision-mission-box h3 {
            font-family: 'Fuente Elegante', monospace;
            font-size: 18px;
        }
    </style>
</head>
<body>
<nav class="navbar">
    <ul class="navbar-nav">
        <?php if (isset($mostrarUsuarios) && $mostrarUsuarios && $permisoUsuario == 1) { ?>
            <li class="nav-item">
                <a class="nav-link" href="usuarios.php">Usuarios</a>
            </li>
        <?php } ?>
        <!-- Otros elementos de la barra de navegación -->
        <li class="nav-item">
            <a class="nav-link" href="#">Permisos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Camaras.php">Cámaras y accesos</a>
        </li>
    </ul>
</nav>

<div class="content">
    <h2>Bienvenido, <?php echo $_SESSION["usuario"]; ?></h2>

    <!-- Agregar margen para separar la imagen del navbar -->
    <div style="margin-top: 65px; text-align: center;">
        <img src="img/SEPRISA.jpg" alt="Imagen de la empresa" width="500">
    </div>

    <!-- Colocar la visión y misión uno al lado del otro dentro de cuadros -->
    <div class="vision-mission-container">
        <div class="vision-mission-box">
            <h3><b>Visión</b></h3>
            <p>
                La visión de nuestra empresa es ser líder en innovación y excelencia en nuestros productos y servicios.
            </p>
        </div>
        <div class="vision-mission-box">
            <h3><b>Misión</b></h3>
            <p>
                Nuestra misión es proporcionar soluciones de alta calidad a nuestros clientes y superar sus expectativas a través del compromiso y la dedicación.
            </p>
        </div>
    </div>
</div>

<!-- Pie de página -->
<div class="footer">
    <p>&copy; 2023 SEPRISA - Todos los derechos reservados</p>
    <p><a href="politica-de-privacidad.html">Política de Privacidad</a> | <a href="terminos-y-condiciones.html">Términos y Condiciones</a></p>
</div>

<!-- Optional JavaScript -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    <!-- Resto de tus scripts JS -->
</body>
</html>
