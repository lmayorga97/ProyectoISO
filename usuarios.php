<?php
// Conectar a la base de datos (ajusta la configuración según tus necesidades)
$servername = "localhost";
$username = "root";
$password = "";
$database = "seguridad";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Función para obtener la lista de usuarios
function obtenerUsuarios($conn) {
    $sql = "SELECT * FROM Usuarios";
    $result = mysqli_query($conn, $sql);
    $usuarios = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $usuarios[] = $row;
        }
    }

    return $usuarios;
}

// Función para agregar un nuevo usuario
function agregarUsuario($conn, $permiso, $usuario, $contrasena) {
    $sql = "INSERT INTO Usuarios (Permiso, Usuario, Contra) VALUES ('$permiso', '$usuario', '$contrasena')";
    mysqli_query($conn, $sql);
}

// Función para actualizar un usuario
function actualizarUsuario($conn, $id, $permiso, $usuario, $contrasena) {
    $sql = "UPDATE Usuarios SET Permiso='$permiso', Usuario='$usuario', Contra='$contrasena' WHERE ID=$id";
    mysqli_query($conn, $sql);
}

// Función para eliminar un usuario
function eliminarUsuario($conn, $id) {
    $sql = "DELETE FROM Usuarios WHERE ID=$id";
    mysqli_query($conn, $sql);
}

// Procesar formulario para agregar usuario
if (isset($_POST['agregar_usuario'])) {
    $permiso = $_POST['permiso'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    agregarUsuario($conn, $permiso, $usuario, $contrasena);
}

// Procesar formulario para actualizar usuario
if (isset($_POST['actualizar_usuario'])) {
    $id = $_POST['id'];
    $permiso = $_POST['permiso'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    actualizarUsuario($conn, $id, $permiso, $usuario, $contrasena);
}

// Procesar solicitud para eliminar usuario
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    eliminarUsuario($conn, $id);
}

// Obtener la lista de usuarios
$usuarios = obtenerUsuarios($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }

        h2 {
            font-size: 24px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="number"],
        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 100%;
        }

        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            cursor: pointer;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>CRUD de Usuarios</h2>

        <!-- Formulario para agregar un nuevo usuario -->
        <form method="post">
            <h3>Agregar Usuario</h3>
            <input type="number" name="permiso" placeholder="Permiso" required>
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <button type="submit" name="agregar_usuario">Agregar</button>
        </form>

        <!-- Lista de usuarios -->
        <h3>Lista de Usuarios</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Permiso</th>
                <th>Usuario</th>
                
                <th>Acciones</th>
            </tr>
            <?php foreach ($usuarios as $usuario) { ?>
                <tr>
                    <td><?php echo $usuario['ID']; ?></td>
                    <td><?php echo $usuario['Permiso']; ?></td>
                    <td><?php echo $usuario['Usuario']; ?></td>
                    <td><?php echo $usuario['Contra']; ?></td>
                    <td>
                        <a href="?eliminar=<?php echo $usuario['ID']; ?>">Eliminar</a>
                        <a href="?editar=<?php echo $usuario['ID']; ?>">Editar</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

       <!-- Formulario para editar usuario (se muestra cuando se hace clic en "Editar" en la lista) -->
<?php if (isset($_GET['editar'])) {
    $idEditar = $_GET['editar'];
    $usuarioEditar = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM Usuarios WHERE ID=$idEditar"));
?>
    <h3>Editar Usuario</h3>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $idEditar; ?>">
        <input type="number" name="permiso" value="<?php echo $usuarioEditar['Permiso']; ?>" required>
        <input type="text" name="usuario" value="<?php echo $usuarioEditar['Usuario']; ?>" required>
        <input type="password" name="contrasena" placeholder="Nueva Contraseña">
        <button type="submit" name="actualizar_usuario">Actualizar</button>
    </form>
        <?php } ?>
    </div>
</body>
</html>
