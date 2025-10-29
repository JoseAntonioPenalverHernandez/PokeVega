<?php
// logout.php
session_start();
session_unset();     // Elimina todas las variables de sesión
session_destroy();   // Destruye la sesión actual

// Redirige al inicio
header("Location: index.php"); // cambia la ruta si tu index está en otra carpeta
exit;
?>
