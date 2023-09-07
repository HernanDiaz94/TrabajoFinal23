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
      header('Location: /TP_Final/admin.php');
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
        header("Location: /TP_Final/admin.php");
      }
      else {
        header("Location: /TP_Final/paginausuario.php ");
        
      }
    } else {
      $message = 'Lo Sentimos, el Usuario y/o contraseña No Existen ';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inicio de Sesion </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/fondo.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Iniciar Sesion</h1>
    

    <form action="login.php" method="POST">
      <input name="usuario" type="text" placeholder="Ingrese su Usuario">
      <input name="password" type="password" placeholder="Ingrese su Contraseña">
      <input type="submit" value="Iniciar">
    </form>


    <p><img src="images/logo.png" alt="500" while="200" height="200" ></p>
  </body>
</html>
