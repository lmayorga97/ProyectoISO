<?php
session_start(); // Iniciar la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Realizar la conexión a la base de datos
    $servername = "localhost";
    $username = "root"; // Cambia esto al nombre de usuario de tu base de datos
    $password = ""; // Cambia esto a la contraseña de tu base de datos
    $database = "seguridad";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    // Consulta para verificar las credenciales
    $sql = "SELECT * FROM Usuarios WHERE usuario = '$usuario' AND contra = '$contrasena'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Las credenciales son válidas, el usuario ha iniciado sesión
        $_SESSION["usuario"] = $usuario;
        $_SESSION['logged_in'] = true; // Establecer la sesión como iniciada
        header("Location: bienvenido.php"); // Redirigir a una página de bienvenida
    } else {
        echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
}
?>

