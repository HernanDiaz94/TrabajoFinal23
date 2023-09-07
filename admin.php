
<?php

session_start();


  require 'mongo.php';

  if (isset($_SESSION['user_id'])) {
    /* $records = $conn->prepare('SELECT id, usuario, password FROM usuarios WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC); */

    $conexion = new Mongo();
    $results = $conexion->find($_SESSION['user_id'], 'usuarios');
    

    $user = null;

    if (count($results) > 0) {
      $user = $results[0];
    }
   
    if ($results[0]->tipo==2) {
        header("Location: /TP_Final/paginausuario.php");
      }
    
    
}


?>

<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Pagina Admin</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				
				<nav>
					<ul>
                        <li><a href="registro.php"><b><u>Registrar Nuevos Usuarios</u></b></a></li>
                        <li><a href="lista_usuarios.php"><b><u>Lista Usuarios</u></b></a></li>
                        <p align="left"><img  src="images/logo.png" alt="500" height="200" width="300"></p>
                        <h4 align="center">Bienvenido ADMIN <h3 align="center"> Usuario: <?=$user->usuario?> </h3></b><h3 align="center"> email: <?=$user->email?> </h3></h4> <h4  align="center"><a href="logout.php"><b> <FONT COLOR="red"><i>Cerrar Sesion</i> </FONT> </b></a></h4>
					
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
							<h2  align="center" class="major">Hola Administrador</h2>
							
                            
                            
                        
							
						</div>
					</section>

			</div>

<p align="center">Hola Esta Listo para ver el trabajo para realizar hoy?</p>



<h2 align="center">Informes</h2>

<?php
    

        
        $resultados = $conexion->select([], 'problemas');
        if ($resultados) {

            

            echo '<table border="1">';
            echo '<tr> 
                    <th>#ID</th> 
                    <th>Usuario</th> 
                    <th>Area</th> 
                    <th>Fecha</th> 
					<th>Tipo</th>
					<th>Resumen del Prblema</th> 
					<th>Estado</th>  
                    <th colspan="2">Operaciones</th>                
                </tr>';

            
            foreach($resultados as $r) {
               
                echo "<tr> 
                        <td>$r->_id</td>
                        <td>$r->usuario</td> 
                        <td>$r->area</td>
                        <td>$r->fecha</td> 
						<td>$r->tipo</td> 
						<td>$r->resumen</td>
						<td>$r->estado</td>
                    
                        <td><a href='editar.php?id=$r->_id'>Editar</a></td>
                        <td><a onclick='return confirm(`¿Está seguro que desea eliminar el problema?`)' href='borrar_problema.php?id=$r->_id'>Eliminar</a></td>

                     </td>";
            }
            echo '</table>';
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