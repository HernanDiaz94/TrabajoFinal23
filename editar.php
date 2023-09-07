<!DOCTYPE HTML>

<html>
	<head>
		<title>Pagina Admin</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<?php

session_start();
error_reporting(0);


$error = false;


require 'mongo.php';
    
    if ($id) {
        $conexion = new Mongo();
        $resultado = $conexion->find($id, 'problemas');

        
            $area= $resultado[0]->area;
            $fecha = $resultado[0]->fecha;
            $tipo = $resultado[0]->tipo;
            $resumen = $resultado[0]->resumen;
            $estado = $resultado[0]->estado;
       
    }

    if (!$error) {
        ?>
            <form action="grabar_problemas.php" method="POST" enctype="multipart/form-data">
                
                <label for="id">ID</label><br>
                <input type="text" name="id" id="id" value="<?=$id?>"><br><br>

                <label for="fecha">Fecha</label><br>
                <input type="text" name="fecha" id="fecha" value="<?=$fecha?>"><br>
                
                <label for="area">Area</label><br>
                <input type="text" name="area" id="area" value="<?=$area?>"><br><br>
                
                <label for="tipo">Tipo de Problema</label><br>
                <input type="text" name="tipo" id="tipo" value="<?=$tipo?>"><br><br>
                <label for="precio">Resumen</label><br>
                <input type="text" name="resumen" id="resumen" value="<?=$resumen?>"><br><br>
                <select name="estado" id="estado" value="<?=$estado?>">
                <option value="Abierto">Abierto</option>
                <option value="Solucionado">Solucionado</option>
                <option value="Demorado">Demorado</option>
                </select>
                <br>
                <input type="submit" name="aceptar" value="Aceptar">
            </form>

            <?php 
    }
 else {
    echo 'No se pudo acceder a los datos';
    $error = true;
}

?>


		<!-- Footer -->
			<footer id="footer" class="wrapper alt">
				<div class="inner">
					<ul class="menu">
                    <li>&copy; GP Informatica.</li><li>Diseño: Gabriel Alejandro Paez Avila</a></li>
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