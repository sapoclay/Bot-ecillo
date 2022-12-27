<?php
require_once('./inc/conexion.php');
// obteniendo el mensaje del usuario a través de ajax
$getMesg = mysqli_real_escape_string($conexion, $_POST['text']);
//comprobando la consulta del usuario a la consulta de la base de datos
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conexion, $check_data) or die("Error");
// si la consulta del usuario coincide con la consulta de la base de datos, mostraremos la respuesta; de lo contrario, irá a otra declaración
if (mysqli_num_rows($run_query) > 0) {
    //recuperando la reproducción de la base de datos de acuerdo con la consulta del usuario
    $fetch_data = mysqli_fetch_assoc($run_query);
    //almacenando la respuesta a una variable que enviaremos a ajax
    $replay = $fetch_data['replies'];
    echo $replay;
} else {
    // Almacenamos la consulta desconocida
    $check_insert = "INSERT INTO `chatbot`(`queries`) VALUES ('$getMesg')";
    $run_insert = mysqli_query($conexion, $check_insert) or die("Error");
    echo "Lo siento. En esto todavía no puedo ayudarte, pero estoy intentando aprender sobre ello";
}
mysqli_close($conexion);
