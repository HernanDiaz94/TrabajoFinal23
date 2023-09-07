<!DOCTYPE HTML>

<html>
	<head>
		<title>Borrar Problema</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
                <a href="admin.php" class="title">Seguir Trabajando</a>
                
                <p align="right"><img  src="images/logo.png" alt="500" height="100" width="200"></p>
				
            </header>
            

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
                            <h3 class="major">Informe de Problema</h3>

                            <?php
    
    require 'mongo.php';
    $conexion = new Mongo();
    $conexion->deleteById( $_GET['id'], 'usuarios');
        echo 'La operacion se realizo exitosamente!';
    ?>

                       



<br>
<br>
<br><br><br><br>
 <a href="lista_usuarios.php"><h3 align="center">Volver a La Pagina Anterior</h3></a>

                            
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