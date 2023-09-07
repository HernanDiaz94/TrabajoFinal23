
<?php
session_start();
require 'mongo.php';
$conexion = new Mongo();

if ( (isset($_POST["nombre_y_apellido"])) && (isset($_POST["DNI"])) && (isset($_POST["sexo"])) && (isset($_POST["area_de_trabajo"])) && (isset($_POST["usuario"])) && (isset($_POST["password"])) && (isset($_POST["email"])) && (isset($_POST["tipo"])) && (isset($_POST["oficina"])))
{

    
    $nombre_y_apellido=$_POST["nombre_y_apellido"];
    $DNI=$_POST["DNI"];
    $sexo=$_POST["sexo"];
    $area_de_trabajo=$_POST["area_de_trabajo"];
    $usuario=$_POST["usuario"];
    $password=$_POST["password"];
    $email=$_POST["email"];
    $tipo=$_POST["tipo"];
    $oficina=$_POST["oficina"];

    

    }

  
   

 
    $conexion->insert(['area_de_trabajo' => $area_de_trabajo, 'tipo' => $tipo, 'sexo' => $sexo, 'DNI' => $DNI, 'nombre_y_apellido' => $nombre_y_apellido ,'email' => $email ,'usuario' => $usuario ,'password' => $password, 'oficina' => array('oficina' => $oficina ) ], 'usuarios');

    
    $_SESSION['mensaje']['mensaje'] = '<b>Exelente!</b> El Usuario se Registro Correctamente';
        $_SESSION['mensaje']['tipo'] = 'success';

        header('Location: http://localhost/TP_Final/lista_usuario2.php');

?>