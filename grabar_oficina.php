<<?php
	
    session_start();
    require 'mongo.php';
    $conexion = new Mongo();
    
        
        extract($_POST);
        
        $conexion->updateById(['nombre_oficina' => $nombre_oficina, 'codigo' => $codigo, 'descripcion' => $descripcion], $id, 'oficinas');
        $_SESSION['mensaje']['mensaje'] = '<b>Exelente!</b> La Oficina se Modifico Correctamente';
        $_SESSION['mensaje']['tipo'] = 'success';

        header('Location: http://localhost/TP_Final/oficinas.php');

       
?>