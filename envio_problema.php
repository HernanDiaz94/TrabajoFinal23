<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Confirmacion de Envio de Problema</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
                <a href="paginausuario.php" class="title">Informar un Problema</a>
                
                <p align="right"><img  src="images/logo.png" alt="500" height="100" width="200"></p>
				
            </header>
            

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
                            <h3 class="major">Informe de Problema</h3>

                       


                             <?php  
$area="";
$tipo="";
$resumen="";
$fecha_actual="";
$estado="";

session_start();
if ( (isset($_POST["area"])) && (isset($_POST["usuario"])) && (isset($_POST["tipo"])) && (isset($_POST["resumen"])) && (isset($_POST["fecha"])) && (isset($_POST["estado"])))
{
    $area=$_POST["area"];
    $usuario=$_POST["usuario"];
    $tipo=$_POST["tipo"];
    $resumen=$_POST["resumen"];
    $fecha_actual=$_POST["fecha"];
    $estado=$_POST["estado"];


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


   

    require 'mongo.php';

    $conexion = new Mongo();

    $fecha=date('Y-m-d');

    $conexion->insert(['area' => $area, 'usuario' => $usuario, 'tipo' => $tipo, 'resumen' => $resumen, 'fecha' => $fecha, 'estado' => $estado ], 'problemas');

    $_SESSION['mensaje']['mensaje'] = '<b>Exelente!</b> El Informe de Problema se Envio Correctamente';
    $_SESSION['mensaje']['tipo'] = 'success';
}
else{
    $_SESSION['mensaje']['mensaje'] = 'Error';
    $_SESSION['mensaje']['tipo'] = 'danger';
}

header('Location: http://localhost/TP_Final/paginausuario2.php');
?>

<br>
<br>
<br><br><br><br>
 <a href="paginausuario.php"><h3 align="center">Volver a La Pagina Anterior</h3></a>

                            
                            <footer id="footer" class="wrapper alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy; GP Informatica</li><li>Diseño: Gabriel Alejandro Paez Avila</li>
					</ul>
				</div>
			</footer>

						

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>