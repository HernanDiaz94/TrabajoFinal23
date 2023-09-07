
                       
<?php
	
    session_start();
    require 'mongo.php';
    $conexion = new Mongo();
    
        extract($_POST);
        
        switch ($tipo) {
            case '1':
                $tipo="Red";
                break;
            case '2':
            $tipo="Software";
                break;
            case '3':
            $tipo="Hardware";
                break;
            case '4':
            $tipo="Informar";
                break;
            default:
                # code...
                break;
        }
        

        $conexion->updateById(['area' => $area, 'tipo' => $tipo, 'resumen' => $resumen, 'fecha' => $fecha, 'estado' => $estado ], $id, 'problemas');

        $_SESSION['mensaje']['mensaje'] = '<b>Exelente!</b> El Ticket se Modifico Correctamente';
        $_SESSION['mensaje']['tipo'] = 'success';

        header('Location: http://localhost/TP_Final/admin2.php');


       
?>
