<?php
session_start();
require 'mongo.php';
$conexion = new Mongo();

if ( (isset($_POST["nombre_oficina"])) && (isset($_POST["codigo"])) && (isset($_POST["descripcion"])))
{

    
    $nombre_oficina=$_POST["nombre_oficina"];
    $codigo=$_POST["codigo"];
    $descripcion=$_POST["descripcion"];
    
    

    }

  
   

 
    $conexion->insert([ 'nombre_oficina' => $nombre_oficina, 'codigo' => $codigo, 'descripcion' => $descripcion ], 'oficinas');

    
    $_SESSION['mensaje']['mensaje'] = '<b>Exelente!</b> La Oficina se Registro Correctamente';
        $_SESSION['mensaje']['tipo'] = 'success';

        header('Location: http://localhost/TP_Final/oficinas.php');

?>