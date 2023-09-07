<<?php
	
    session_start();
    require 'mongo.php';
    $conexion = new Mongo();
    
        
        extract($_POST);
        
        $conexion->updateById([ 'nombre_insumo' => $nombre_insumo, 'codigo' => $codigo, 'descripcion' => $descripcion, 'tipo_insumo' => $tipo_insumo, 'oficina' => $oficina ], $id, 'insumos');
        $_SESSION['mensaje']['mensaje'] = '<b>Exelente!</b> El Insumo se Modifico Correctamente';
        $_SESSION['mensaje']['tipo'] = 'success';

        header('Location: http://localhost/TP_Final/insumos.php');

       
?>