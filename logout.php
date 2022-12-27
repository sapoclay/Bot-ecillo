<?php
session_start();
session_destroy();
// Redireccionamos al index.php:
header('Location: index.php');
?>