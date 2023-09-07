<?php
session_start();
require 'mongo.php';
$conexion = new Mongo();

if ( (isset($_POST["nombre_insumo"])) && (isset($_POST["codigo"])) && (isset($_POST["descripcion"])) && (isset($_POST["tipo_insumo"])) && (isset($_POST["oficina"])))
{

    
    $nombre_insumo=$_POST["nombre_insumo"];
    $codigo=$_POST["codigo"];
    $tipo_insumo=$_POST["tipo_insumo"];
    $oficina=$_POST["oficina"];
    $descripcion=$_POST["descripcion"];
    
    

    }

  
   

 
    $conexion->insert([ 'nombre_insumo' => $nombre_insumo, 'codigo' => $codigo, 'descripcion' => $descripcion, 'tipo_insumo' => $tipo_insumo, 'oficina' => $oficina ], 'insumos');

    
    $_SESSION['mensaje']['mensaje'] = '<b>Exelente!</b> El Insumo se Registro Correctamente';
        $_SESSION['mensaje']['tipo'] = 'success';

        header('Location: http://localhost/TP_Final/insumos.php');

?>