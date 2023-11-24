<?php
session_start();
session_destroy();
header("Location: login.html"); // Redirigir de nuevo a la página de inicio de sesión
?>
