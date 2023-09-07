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
  if ($results[0]->tipo==2) {
    header("Location: /TP_Final/paginausuario2.php");
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
          <a href='editar_perfil.php?id=<?=$user->_id?>'>Editar Perfil</a>
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
        <li class='launcher'>
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
          <br>
          <li class='launcher'>
            <i class="icon-italic"></i>
            <a href="insumos.php">Insumos</a>
          </li>

      </ul>
      <div data-toggle='tooltip' id='beaker' title='Made by lab2023'></div>
    </section>

    <section id='tools'>
      <ul class='breadcrumb' id='breadcrumb'>
        <li class='title'>Formulario de Registro</li>

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
            <div class='col-md-offset-1 col-md-10'>
           
            <form action="insertaroficina.php" method="POST">
      <label class='control-label' for="">Nombre de la Oficina</label><br>
      <input required  class='form-control' name="nombre_oficina" type="text" placeholder="Ingrese la Oficina">
      <label class='control-label' for="">Codigo</label><br>
      <input required  class='form-control' name="codigo" type="text" placeholder="Ingrese el Codigo">
      <label class='control-label' for="">Descripcion</label>
                <textarea class='form-control' name="descripcion" cols="50" rows="10"
                  placeholder="Ingrese una Descripcion" required></textarea><br>
      
      <br> <br> <br> <br>
      <input  class='btn btn-default' type="submit" value="Registrar">
    </form>

      
            </div>

          </div>
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