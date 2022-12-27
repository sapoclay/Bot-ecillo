<?php
// Iniciamos sesión  e impirtamos la conexión a la BD
session_start();
require_once('./inc/conexion.php');

// Si el usuario no está logueado, lo redireccionamos al bot...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Actualizar registros de la base de datos</title>
    <link rel="icon" type="image/jpg" href="./img/favicon.ico" />
    <link rel="stylesheet" href="./css/style.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"/>
</head>

<body class="loggedin">
    <?php
    include("./inc/menu.php");
    ?>
    <div class="content">
        <h2>Administración</h2>
        <div>
            <h1>Actualizar un registro sin respuesta</h1>
            <br>
            <?php
            if (!$_POST) {
            ?>
                <div class="form">
                    <form method="POST" action="admin.php">
                        <p>Pregunta:
                            <?php
                            // creamos la sentencia SQL y la ejecutamos
                            $consulta = 'select queries from chatbot where replies is null';
                            $resultado = mysqli_query($conexion, $consulta);
                            $numfilas = $resultado->num_rows;
                            //Generamos el campo select
                            echo '<select name="queries">';
                            if ($numfilas == 0) {
                                echo '<option>NO HAY CONSULTAS SIN RESPUESTA</option>';
                                echo '</select>';
                            } else {
                                while ($row = mysqli_fetch_array($resultado)) {
                                    echo '<option>' . $row["queries"] . '</option>';
                                }
                                echo '</select>';


                            ?>
                        </p>
                        <br />
                        <p><!--Campo para añadir una respuesta nueva-->
                            Respuesta:<br/>
                            <textarea rows="4" cols="50" name="replies"></textarea><br />
                        </p>
                        <br />
                        <p>
                            <input type="submit" value="Actualizar">
                        </p>
                    <?php
                            }
                    ?>
                    </form>
                </div>
            <?php
            } else {
                // Recibimos los datos del formulario
                $replies = $_POST["replies"];
                $queries = $_POST["queries"];


                // Montamos la sentencia SQL
                $ssql = "update chatbot set replies='$replies' Where queries='$queries'";

                // Ejecutamos la sentencia de actualización
                if (mysqli_query($conexion, $ssql)) {
                    echo '<p>Registro actualizado con éxito.</p>
                <br />
                <p>
                    <a href="admin.php" class="volver">Actualizar otro registro</a>
                </p>';
                } else {
                    echo '<p>Hubo un error al actualizar: ' . mysqli_error($conexion) . '</p>';
                }
            }
            mysqli_close($conexion); //cerramos la conexión
            ?>

        </div>
    </div>
    <script src="./js/menu.js"></script> <!-- cargamos el jquery para utilizar el menú -->

</body>

</html>