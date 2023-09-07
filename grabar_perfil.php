<<?php
	
    session_start();
    require 'mongo.php';
    $conexion = new Mongo();
    
        
        extract($_POST);
        
        $conexion->updateById(['area_de_trabajo' => $area_de_trabajo, 'sexo' => $sexo, 'DNI' => $DNI, 'nombre_y_apellido' => $nombre_y_apellido ,'email' => $email ,'usuario' => $usuario ,'password' => $password ], $id, 'usuarios');
        $_SESSION['mensaje']['mensaje'] = '<b>Exelente!</b> El Perfil se Modifico Correctamente';
        $_SESSION['mensaje']['tipo'] = 'success';

        header('Location: http://localhost/TP_Final/lista_usuario2.php');

       
?>