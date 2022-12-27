<?php
// Iniciamos sesión
session_start();
require_once('./inc/conexion.php');

// redirección en caso de que el usuario no esté logueado
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
            <h1>Actualizar una pregunta</h1>
            <br>
            <?php
            if (!$_POST) {
            ?>
                <div class="form">
                    <form method="POST" action="answers.php">
                        <p>Pregunta:
                            <?php
                            // creamos la sentencia SQL y la ejecutamos
                            $consulta = 'select queries, replies from chatbot';
                            $resultado = mysqli_query($conexion, $consulta);
                            $numfilas = $resultado->num_rows;
                            //Generamos el campo select
                            echo '<select name="oldquerie">';
                            while ($row = mysqli_fetch_array($resultado)) {
                                echo '<option title="'.$row["replies"].'">' . $row["queries"] . '</option>';
                            }
                            echo '</select>';
                            ?>
                        </p>
                        <br />
                        <p>
                            Nueva pregunta:<br/>
                            <textarea rows="4" cols="50" name="newquerie"></textarea><br />
                        </p>
                        <br />
                        <p>
                            <input type="submit" value="Actualizar">
                        </p>
                    </form>
                </div>
            <?php
            } else {
                // Recibimos los datos del formulario
                $newquerie = $_POST["newquerie"];
                $oldquerie = $_POST["oldquerie"];


                // Montamos la sentencia SQL
                $ssql = "update chatbot set queries='$newquerie' Where queries='$oldquerie'";

                // Ejecutamos la sentencia de actualización
                if (mysqli_query($conexion, $ssql)) {
                    echo '<p>Registro actualizado con éxito.</p>
                <br />
                <p>
                    <a href="answers.php" class="volver">Cambiar otra pregunta</a>
                </p>';
                } else {
                    echo '<p>Hubo un error al actualizar: ' . mysqli_error($conexion) . '</p>';
                }
            }
            mysqli_close($conexion);
            ?>

        </div>
    </div>

    
    <script src="./js/menu.js"></script>

</body>

</html>