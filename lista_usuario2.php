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

  if ($results[0]->tipo == 2) {
    header("Location: /TP_Final/paginausuario2.php");
  }
}


?>




<!DOCTYPE html>
<html class='no-js' lang='es'>

<head>
  <meta charset='utf-8'>
  <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
  <title>Lista de Usuarios</title>
  <meta content='lab2023' name='author'>
  <meta content='' name='description'>
  <meta content='' name='keywords'>
  <link href="assets/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" />
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/images/logo.png" rel="icon" type="image/ico" />
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
          <strong><?= $user->usuario ?></strong>
          <img class="img-rounded" src="https://i.pinimg.com/originals/07/69/f4/0769f40cca28c9a72997cb472d885ba5.png" />
          <b class='caret'></b>
        </a>
        <ul class='dropdown-menu'>
          <li>
            <a href='editar_perfil.php?id=<?= $user->_id ?>'>Editar Perfil</a>
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
        <li class='active launcher'>
          <i class='icon-file-text-alt'></i>
          <a href="lista_usuario2">Lista de Usuarios</a>
        </li>
        <br>
        <li class='launcher'>
          <i class='icon-table'></i>
          <a href="admin2.php">Informes</a>
        </li>
        <br>
          <li class='launcher'>
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
        <li class='title'>Usuarios</li>

      </ul>
      <div id='toolbar'>

      </div>
    </section>

    <div id='content'>
      <div class='panel panel-default grid'>
        <div class='panel-heading'>
          <i class='icon-file-text-alt'></i>
          Lista de Usuarios
        </div>
        <div class='panel-body'>
          <?php if (isset($_SESSION['mensaje']['mensaje']) && isset($_SESSION['mensaje']['tipo'])) { ?>
            <div class="row">
              <div class="col-12">
                <div class="alert alert-<?= $_SESSION['mensaje']['tipo'] ?>">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <?= $_SESSION['mensaje']['mensaje'] ?>
                </div>
              </div>
            </div>
          <?php unset($_SESSION['mensaje']);
          } ?>
          <div class='panel-body'>
            <div class='row'>
              <div class='col-md-9'>

              </div>

            </div>
          </div>



          <table id="tabla" class='table'>
            <thead>
              <tr>
                <th>#ID</th>
                <th>Nombre y Apellido</th>
                <th>DNI</th>
                <th>Oficina</th>
                <th>Sexo</th>
                <th>Area de Trabajo</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Email</th>
                <th>Tipo de Usuario</th>
                <th>Operaciones</th>
              </tr>
            </thead>
            <tbody>
              <?php



              $nombre_y_apellido = "";
              $resultados = $conexion->select([], 'usuarios');
              if ($resultados) {

                  


                foreach ($resultados as $r) {
                  if (isset($r->tipo))
                    if ($r->tipo == 1)
                      $tipo = 'Administrador';
                    else $tipo = 'Usuario';
                  else $tipo = '';
              ?>
                  <tr>
                    <td><?= $r->_id ?></td>
                    <td><?= ($r->nombre_y_apellido ?? '') ?></td>
                    <td><?= ($r->DNI ?? '') ?></td>
                   <td><ul> <?php foreach ($r->oficina->oficina as $ofi) echo('<li>'.$ofi.'</li>'); ?></ul></td>
                    <td><?= ($r->sexo ?? '') ?></td>
                    <td><?= ($r->area_de_trabajo ?? '') ?></td>
                    <td><?= ($r->usuario ?? '') ?></td>
                    <td><?= ($r->password ?? '') ?></td>
                    <td><?= ($r->email ?? '') ?></td>
                    <td><?= $tipo ?></td>
                    <td>
                      <a class='btn btn-info' href='editar_usuario2.php?id=<?= $r->_id ?>'> <i class='icon-edit'></i> Editar</a> <a class='btn btn-danger' onclick='return confirm(`¿Está seguro que desea eliminar el problema?`)' href='borrar_usuario2.php?id=<?= $r->_id ?>'> <i class='icon-trash'></i>Eliminar</a>
                    </td>;
                  </tr>

              <?php
                }
              }
              ?>
            </tbody>
          </table>
          <!-- Footer -->
          <!-- Javascripts -->

          <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
          <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
          <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script>
          <script src="assets/javascripts/application-985b892b.js" type="text/javascript"></script>
          <script type="text/javascript" scr="datatables/datatables.min.js"> </script>
          <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
          <script type="text/javascript" scr="main.js"> </script>
          
          <script>
            $(document).ready(function() {
              $('#tabla').DataTable();
            });
          </script>
          <!-- Google Analytics -->

          <script>
            var _gaq = [
              ['_setAccount', 'UA-XXXXX-X'],
              ['_trackPageview']
            ];
            (function(d, t) {
              var g = d.createElement(t),
                s = d.getElementsByTagName(t)[0];
              g.src = ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js';
              s.parentNode.insertBefore(g, s)
            }(document, 'script'));
          </script>
          <script type="text/javascript">
            <?php if (isset($_SESSION['mensaje']['mensaje']) && isset($_SESSION['mensaje']['tipo'])) { ?>

            <?php unset($_SESSION['mensaje']);
            } ?>

            $('.alert').fadeOut(4000);
          </script>
</body>

</html>