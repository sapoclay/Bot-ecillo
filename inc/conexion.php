<?php
define("bServidor", "localhost");
define("bUsuario", "root"); // Usuario de la base de datos
define("bPass", "xxxxxx"); // Password de la base de datos
define("bBd", "chatbot"); // Nombre de la base de datos

$conexion = mysqli_connect(bServidor, bUsuario, bPass, bBd);
/* cambiar los caracteres utf8 */
$conexion->set_charset("utf8");
// Comprobar la conexión
if (mysqli_connect_errno()) {
        echo "Fallo al conectar con MySQL: " . mysqli_connect_error();
        exit();
}
