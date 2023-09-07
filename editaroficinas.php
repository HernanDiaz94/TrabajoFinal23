<?php
  require 'mongo.php';

  session_start();
  
  

  if (isset($_SESSION['user_id'])) {
    
	  $conexion = new Mongo();
    $results = $conexion->find($_SESSION['user_id'], 'usuarios');
    $user = null;

    if (count($results) > 0) {
      $user = $results[0];
    }
  }

?>

<!DOCTYPE html>
<html class='no-js' lang='es'>

<head>
  <meta charset='utf-8'>
  <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
  <title>Reportes e Informe</title>
  <meta content='lab2023' name='author'>
  <meta content='' name='description'>
  <meta content='' name='keywords'>
  <link href="assets/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" />
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/images/logo.png" rel="icon" type="image/ico" />

</head>

<body class='main page'>
  <!-- Navbar -->
  <div class='navbar navbar-default' id='navbar'>
    <a class='navbar-brand' href='#'>
      <i class="icon-desktop"></i>
      Sistema de Informes
    </a>


    <ul class='nav navbar-nav pull-right'>
      <li class='dropdown'>

      </li>
      <li>
          <a href='registro.php'>
            <i class='icon-user'></i>
            Resgistrar Usuario
          </a>
        </li>
      <li class='dropdown user'>
        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
          <i class='icon-user'></i>
          <strong>
            <?=$user->usuario?>
          </strong>
          <img class="img-rounded" src="http://placehold.it/20x20/ccc/777" />
          <b class='caret'></b>
        </a>
        <ul class='dropdown-menu'>
          <li>
            <a href='#'>Editar Perfil</a>
          </li>
          <li class='divider'></li>
          <li>
            <a href="logout.php">Cerrar Sesion</a>
          </li>
        </ul>
      </li>
    </ul>
  </div>

  <div id='wrapper'>
    <!-- Sidebar -->
    <section id='sidebar'>
      <i class='icon-align-justify icon-large' id='toggle'></i>
      <ul id='dock'>
        <li class='active launcher'>
          <i class='icon-flag'></i>
          <a href="paginausuario2.php">Reportes e Informes</a>
        </li>
        <br>
        <li class='launcher'>
          <i class='icon-file-text-alt'></i>
          <a href="lista_usuario2">Lista de Usuarios</a>
        </li>
        <br>
        <li class='launcher'>
          <i class='icon-table'></i>
          <a href="admin2.php">Informes</a>
        </li>
        <br>
          <li class='active launcher'>
            <i class="icon-list-alt"></i>
            <a href="oficinas.php">Oficinas</a>
          </li>

      </ul>
      <div data-toggle='tooltip' id='beaker' title='Made by lab2023'></div>
    </section>

    <section id='tools'>
      <ul class='breadcrumb' id='breadcrumb'>
        <li class='title'>Editar Oficina</li>

      </ul>
      <div id='toolbar'>

      </div>
    </section>

    <div id='content'>
      <div class='panel panel-default'>
        <div class='panel-heading'>
          <i class='icon-edit icon-large'></i>
          Formulario
        </div>
        <div class='panel-body'>
          <?php if( isset($_SESSION['mensaje']['mensaje']) && isset($_SESSION['mensaje']['tipo']) ){ ?>
          <div class="row">
            <div class="col-12">
              <div class="alert alert-<?=$_SESSION['mensaje']['tipo']?>">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?=$_SESSION['mensaje']['mensaje']?>
              </div>
            </div>
          </div>
          <?php unset($_SESSION['mensaje']);} ?>
          <div class='row'>

          <?php



error_reporting(0);

$error = false;

    if ($_GET['id']) {
        $conexion1 = new Mongo();
        $resultado = $conexion1->find($_GET['id'], 'oficinas');
        
            $nombre_oficina= $resultado[0]->nombre_oficina;
            $codigo = $resultado[0]->codigo;
            $descripcion = $resultado[0]->descripcion;
       
    }

    if (!$error) {
        ?>
            <div class='col-md-offset-1 col-md-10'>
            <form action="grabar_oficina.php" method="POST" enctype="multipart/form-data">
                
            <label class='control-label' for="id">ID</label><br>
            <input class='form-control' type="text" name="id" id="id" value="<?=$_GET['id']?>"><br><br>
            
            <label class='control-label' for="">Nombre de la Oficina</label><br>
      <input required  class='form-control' name="nombre_oficina" id="nombre_oficina" type="text" value="<?=$nombre_oficina?>">
      <label class='control-label' for="">Codigo</label><br>
      <input required  class='form-control' name="codigo" id="codigo" type="text" value="<?=$codigo?>">
      <label class='control-label' for="precio">Descripcion</label><br>
                <input class='form-control' type="text" name="descripcion" id="descripcion" value="<?=$descripcion?>"><br><br>
                <br>
                <input class='btn btn-default' type="submit" name="aceptar" value="Aceptar">
            </form>

              <?php 
            }
            else {
            echo 'No se pudo acceder a los datos';
            $error = true;
                }

                ?>








            

          
        </div>

        </section>
        <hr>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <!-- Javascripts -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script>
  <script src="assets/javascripts/application-985b892b.js" type="text/javascript"></script>
  <script type="text/javascript">


      <?php if( isset($_SESSION['mensaje']['mensaje']) && isset($_SESSION['mensaje']['tipo']) ){ ?>
        
      <?php unset($_SESSION['mensaje']);} ?>

      $('.alert').fadeOut(4000);
      
    </script>
     
</body>

</html>