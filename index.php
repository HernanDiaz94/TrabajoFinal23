<?php

  session_start();
  require 'mongo.php';
  if (isset($_SESSION['user_id'])) {
    $conexion = new Mongo();
    $results = $conexion->find($_SESSION['user_id'], 'usuarios');
    if( ($id_perfil = $results[0]->tipo ?? -1) == 2 ){
      header("Location: /TP_Final/paginausuario.php");
    }
    if( ($id_perfil = $results[0]->tipo ?? -1) == 1 ){
      header('Location: /TP_Final/admin2.php');
    }
    
  }
  

  if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
    /* $records = $conn->prepare('SELECT id, tipo, usuario, password FROM usuarios WHERE usuario = :usuario');
    $records->bindParam(':usuario', $_POST['usuario']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC); */
    $conexion = new Mongo();
    $results = $conexion->select(['usuario' => $_POST['usuario']], 'usuarios');

    $message = '';

    if (isset($_SESSION['user_id'])) {
      header('Location: /TP_Final/paginausuario.php');
      
    
    }

    if (count($results) > 0 && ($_POST['password']== $results[0]->password)) {
      $_SESSION['user_id'] = (string) $results[0]->_id;
      if ($results[0]->tipo==1) {
        header("Location: /TP_Final/admin2.php");
      }
      else {
        header("Location: /TP_Final/paginausuario2.php ");
        
      }
    } else {
      $message = 'Lo Sentimos, el Usuario y/o contraseña No Existen ';
    }
  }

?>

<!DOCTYPE html>
<html class='no-js' lang='es'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>Inicio de Sesion</title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link href="assets/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/images/logo.png" rel="icon" type="image/ico" />
    
  </head>
  <body class='login'>
    <div class='wrapper'>
      <div class='row'>
        <div class='col-lg-12'>
          <div class='brand text-center'>
            <h1>
            <img src="images/logo.png" width="100%">
              Sistema de Informes
            </h1>
          </div>
        </div>
      </div>
      <div class='row'>
        <div class='col-lg-12'>
          <form action="index.php" method="POST">
          <?php if(!empty($message)): ?>
            <p> <?= $message ?></p>
          <?php endif; ?>
            <fieldset class='text-center'>
              <legend>Iniciar Sesión</legend>
              <div class='form-group'>
                <input class='form-control' placeholder='Ingrese su Usuario' type='text' name="usuario">
              </div>
              <div class='form-group'>
                <input class='form-control' placeholder='Ingrese su Contraseña' type='password' name="password">
              </div>
              <div class='text-center'>
                <button class="btn btn-default">Iniciar sesión</button>
                <br>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <!-- Javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script><script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
  </body>
</html>
