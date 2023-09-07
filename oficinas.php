<?php

session_start();


  require 'mongo.php';

  if (isset($_SESSION['user_id'])) {
    

    $conexion = new Mongo();
    $results = $conexion->find($_SESSION['user_id'], 'usuarios');
    

    $user = null;

    if (count($results) > 0) {
      $user = $results[0];
    }
   
    if ($results[0]->tipo==2) {
        header("Location: /TP_Final/paginausuario2.php");
      }
    
    
}


?>




<!DOCTYPE html>
<html class='no-js' lang='es'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>Pagina Administrador</title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link href="assets/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" /><link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/images/logo.png" rel="icon" type="image/ico" />
    <link href="assets/stylesheets/jquery.jgrowl.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

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
        <li>
        <a href='crearoficina.php'>
          <i class="icon-list-alt"></i>
          Registrar una Oficina
        </a>
      </li>
        <li class='dropdown user'>
          <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
            <i class='icon-user'></i>
            <strong><?=$user->usuario?></strong>
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
          <li class='title'>Oficinas</li>
          
        </ul>
        <div id='toolbar'>
          
        </div>
      </section>
      <div id='content'>
        
        <div class='panel panel-default grid'>
          <div class='panel-heading'>
            <i class="icon-list-alt"></i>
            Oficinas Registradas
            
            </div>
          </div>
          <div class='panel-body filters'>

            <?php if( isset($_SESSION['mensaje']['mensaje']) && isset($_SESSION['mensaje']['tipo']) ){ ?>
            <div class="row">
              <div class="col-12">
                <div class="alert alert-<?=$_SESSION['mensaje']['tipo']?>">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <?=$_SESSION['mensaje']['mensaje']?>
                </div>
              </div>
            </div>
            <?php } ?>
            <div class='row'>
              <div class='col-md-12'>
                <table class='table' id="tabla">
                  <thead>
                    <tr>
                        <th >#ID</th> 
                        <th>Oficina</th> 
                        <th>Codigo</th> 
                        <th>Descripcion</th> 
                        <th>Operaciones</th>             
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $resultados = $conexion->select([], 'oficinas');
                      if ($resultados) {
                        foreach($resultados as $r) {
                    ?>
                          <tr class='active'>
                          </td>
                            <td><?=$r->_id?></td>
                            <td><?=$r->nombre_oficina?></td> 
                            <td><?=$r->codigo?></td>
                            <td><?=$r->descripcion?></td> 
                            <td><a class='btn btn-info' href='editaroficinas.php?id=<?=$r->_id?>'> <i class='icon-edit'></i> Editar</a> <a class='btn btn-danger' onclick='return confirm(`¿Está seguro que desea eliminar el problema?`)' href='borrar_oficina.php?id=<?=$r->_id?>'> <i class='icon-trash'></i>Eliminar</a></td></td>
                    <?php
                        }
                      }?> 
                  </tbody>
                </table>         
              </div>
            </div>
          </div>
      </div>
    </div>
    <!-- Footer -->
    <!-- Javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script><script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#tabla').DataTable();
        });
      <?php if( isset($_SESSION['mensaje']['mensaje']) && isset($_SESSION['mensaje']['tipo']) ){ ?>
        $.jGrowl({
          message: '<?=$_SESSION['mensaje']['mensaje']?>',
          group: 'alert alert-<?=$_SESSION['mensaje']['tipo']?>',
          life: 5000
        });
      <?php unset($_SESSION['mensaje']);} ?>

      $('.alert').fadeOut(3000);
      
    </script>
  </body>
</html>