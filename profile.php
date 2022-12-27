<?php
session_start();
require_once('./inc/conexion.php');
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
$stmt = $conexion->prepare('SELECT password, email FROM accounts WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Página del Perfil</title>
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/jpg" href="./img/favicon.ico" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body class="loggedin">
    <?php
    include("./inc/menu.php");
    if (!$_POST) {
    ?>
        <div class="form">
            <form method="POST" action="profile.php">
                <div class="content">
                    <h2>Perfil del administrador</h2>
                    <div>
                        <p>Los detalles de la cuenta se pueden ver a continuación:</p>
                        <table>
                            <tr>
                                <td>Nombre de usuario:</td>
                                <td><?= $_SESSION['name'] ?></td>
                            </tr>
                            <tr>
                                <td>Nuevo nombre de usuario:</td>
                                <td><input type="text" name="name" value="<?= $_SESSION['name'] ?>" require /></td>
                            </tr>
                            <tr>
                                <td>Contraseña:</td>
                                <td><?= $password ?></td>
                            </tr>
                            <tr>
                                <td>Nueva contraseña:</td>
                                <td><input type="password" name="password" value="<?= $password ?>" require /></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><?= $email ?></td>
                            </tr>
                            <tr>
                                <td>Nuevo Email:</td>
                                <td><input type="text" name="email" value="<?= $email ?>" require /></td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <input type="submit" value="Actualizar">
                    </div>
                </div>
            </form>
        </div>
    <?php
    } else {
        try {
            // Recibimos los datos del formulario
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = crypt($_POST["password"], '_S4..some');
            $id = $_SESSION['id'];
            $sql = "UPDATE accounts SET username = '$name', password = '$password', email = '$email' WHERE id = '$id'";
            // Ejecutamos la sentencia de actualización
            if (mysqli_query($conexion, $sql)) {
                echo '<p id="RegAct">Registro actualizado con éxito.</p>
            <p>
                <a href="profile.php" class="volver">Ver el perfil de usuario</a>
            </p>';
            } else {
                echo '<p>Hubo un error al actualizar: ' . mysqli_error($conexion) . '</p>';
            }
        } catch (Exception $e) {
            echo "Ocurrió algo con la base de datos: " . $e->getMessage();
        }
        mysqli_close($conexion);
    }
    ?>
    <script src="./js/menu.js"></script>
</body>
</html>