<?php
session_start();
require_once('./inc/conexion.php');
// Ahora verificamos si se enviaron los datos del formulario de inicio de sesión, isset() verificará si los datos existen.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// No se pudieron obtener los datos que deberían haberse enviado.
	exit('Completa los campos de nombre de usuario y contraseña!!');
}
// Preparamos el SQL.
if ($stmt = $conexion->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Almacena el resultado para que podamos verificar si la cuenta existe en la base de datos.
	$stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // La cuenta existe, ahora verificamos la contraseña.
        if (password_verify($_POST['password'], $password)) {
            // Verificación correcta! El usuario se ha logueado!
            // Creamos la sesión
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            // Redirigimos al usuario a admin.php
            header('Location: admin.php');
        } else {
            // Contraseña incorrecta
            echo '<div class="errores">Contraseña incorrecta!</div>';
        }
    } else {
        // Nombre de usuario incorrecto
        echo '<div class="errores">Usuario y/o contraseña incorrectos!</div>';
    }
	$stmt->close(); // Cerramos la conexión
}
?>