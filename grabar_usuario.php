<?php
	
    session_start();
    require 'mongo.php';
    $conexion = new Mongo();
    
        
        extract($_POST);
        
        

        
        $conexion->updateById(['area_de_trabajo' => $area_de_trabajo, 'tipo' => $tipo, 'sexo' => $sexo, 'DNI' => $DNI, 'nombre_y_apellido' => $nombre_y_apellido ,'email' => $email ,'usuario' => $usuario ,'password' => $password, 'oficina' => array('oficina' => $oficina ) ], $id, 'usuarios');
        $_SESSION['mensaje']['mensaje'] = '<b>Exelente!</b> El Usuario se Edito Correctamente';
        $_SESSION['mensaje']['tipo'] = 'success';

        header('Location: http://localhost/TP_Final/lista_usuario2.php');

       
?>
