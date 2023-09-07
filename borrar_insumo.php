<?php
    require 'mongo.php';
    $conexion = new Mongo();
    $conexion->deleteById( $_GET['id'], 'insumos');
    session_start();
    $_SESSION['mensaje']['mensaje'] = '<b>Exelente!</b> La operacion se realizo exitosamente!';
    $_SESSION['mensaje']['tipo'] = 'success';
    header('Location: insumos.php')
?>