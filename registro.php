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

<?php
                     
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
  <script src="/assets/3463b090afc66f573d74febe0935c1f6.js" type="text/javascript" ></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
           
            <form action="grabar_registro.php" method="POST">
      <label class='control-label' for="">Nombre y Apellido</label><br>
      <input required  class='form-control' name="nombre_y_apellido" type="text" placeholder="Ingrese su Nombre y Apellido">
     
      

      <label class='control-label' for="">Oficina </label><br>
      <select required  class='form-control' name="oficina[]" id="oficina"   multiple>
      <?php
                      $resultados = $conexion->select([], 'oficinas');
                      if ($resultados) {
                        foreach($resultados as $r) {
                    ?>
                       <option value="<?=$r->codigo?>"><?=$r->nombre_oficina?></option>  
                    <?php
                        }
                      }?> 
      
      </select> 
      <br>
      <label class='control-label' for="">DNI</label><br>
      <input required  class='form-control' name="DNI" type="text" placeholder="Ingrese su DNI">
      <label class='control-label' for="">Sexo</label><br>
      <select required  class='form-control' name="sexo" id="sexo">
      <option value="">Seleccione una opción</option>
      <option value="Femenino">Femenino</option>
      <option value="Masculino">Masculino</option>
      <option value="Prefiero no Especificar">Prefiero no Especificar</option>
      </select>
      <label class='control-label' for="">Area de Trabajo</label><br>
      <input required  class='form-control' name="area_de_trabajo" type="text" placeholder="Ingrese su Area de Trabajo">
      <label class='control-label' for="">Usuario</label><br>
      <input required  class='form-control' name="usuario" type="text" placeholder="Ingrese su Usuario">
      <label class='control-label' for="">Contraseña</label><br>
      <input required  class='form-control' name="password" type="password" placeholder="Ingrese Su Contraseña">
      <input required  class='form-control' name="confirm_password" type="password" placeholder="Confirme su Contraseña">
      <label class='control-label' for="">Email</label><br>
      <input required  class='form-control' name="email" type="text" placeholder="Ingrese su Email">
      <label class='control-label' for="">Ingrese el Tipo De Usuario</label><br>
      <select required  class='form-control' name="tipo" id="">
      <option value="">Seleccione una opción</option>
      <option value="1">Administrador</option>
      <option value="2">Usuario Normal</option>
      </select>
      
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
  <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 
 <script>
    new MultiSelectTag('oficina', {
    rounded: true,    // default true
    shadow: true      // default false
})
</script>
  
  <script type="text/javascript">


      <?php if( isset($_SESSION['mensaje']['mensaje']) && isset($_SESSION['mensaje']['tipo']) ){ ?>
        
      <?php unset($_SESSION['mensaje']);} ?>

      $('.alert').fadeOut(4000);
      
    </script>
     
</body>

</html>