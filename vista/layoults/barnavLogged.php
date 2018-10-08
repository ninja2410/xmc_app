<?php
session_start();

$now = time();

if($now > $_SESSION['expire']) 
{
  session_destroy();
  echo "Su sesion a terminado,
  <a href='../login/login.php'>Necesita Hacer Login</a>";
  exit;
  $jugadores=0;
}

if(!isset($_SESSION['iniciado']))
{
   header("Location: ../login/login.php");
   $jugadores=0;
}else
{
  require_once('..\..\Negocio/ClassUsuario.php');
  $partido=new Usuario();
  $data=$partido->selectPermisoUsuario($_SESSION['id']);
  $permisos = array();
  while ($row=mysqli_fetch_array($data)) 
  {
    array_push($permisos,$row['id_permiso']);
  }
}
$jugadores=0;
$partidos=0;
$socios=0;
$lesiones=0;
$documentos=0;
$personas=0;
foreach($permisos as $key => $value) 
{
  if($value==2)
  {
    $jugadores=1;
  }
  if($value==3)
  {
    $partidos=1;
  }
  if($value==4)
  {
    $socios=1;
  }
}


?>

<!-- Inicio de Barra de navegacion -->

<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg"  color-on-scroll="100">
  <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="Index.php">
          <img src="../assets/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
          Xelajú MC
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto">
            <?php
            if($jugadores==1)
            {
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">accessibility_new</i> Jugadores
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="..\..\vista\jugador/index.php">Jugadores</a>
                <a class="dropdown-item" href="..\..\vista\categoria/index.php">Categorías</a>
                <a class="dropdown-item" href="..\..\vista\entrenador/index.php">Entrenadores</a>
              </div>
            </li>
            <?php
            }
            ?>
            <?php
            if($partidos==1)
            {
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">access_time</i> Partidos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="..\..\vista\partido/index.php">Registro de Partidos</a>
                <a class="dropdown-item" href="..\..\vista\alineacion/index.php">Alineaciones</a>
                <a class="dropdown-item" href="..\..\vista\arbitro/index.php">Arbitro</a>
                <a class="dropdown-item" href="..\..\vista\estadisticas/index.php">Estadisticas</a>
                <a class="dropdown-item" href="..\..\vista\equipo/index.php">Equipos</a>
                <a class="dropdown-item" href="..\..\vista\estadio/index.php">Estadios</a>
                <a class="dropdown-item" href="..\..\vista\temporada/index.php">Temporadas</a>
              </div>
            </li>
            <?php
            }
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">supervisor_account</i> Socios
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="..\..\vista\socio/index.php">Registro de Socios</a>
                <a class="dropdown-item" href="..\..\vista\pagos/index.php">Pagos</a>
                <a class="dropdown-item" href="..\..\vista\membresia/index.php">Membresías</a>
                <a class="dropdown-item" href="..\..\vista\beneficio/index.php">Beneficios</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">control_point</i> Lesiones
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="..\..\vista\lesion-jugador/index.php">Registro de lesiones por jugador</a>
                <a class="dropdown-item" href="..\..\vista\ficha_medica/index.php">Ficha Médica</a>
                <a class="dropdown-item" href="..\..\vista\parte_cuerpo/index.php">Detalles de Ficha Médica</a>
                <a class="dropdown-item" href="..\..\vista\medico/index.php">Médicos</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">chrome_reader_mode</i> Documentos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="..\..\vista\documento_digital/index.php">Documentos Digitales</a>
                <a class="dropdown-item" href="..\..\vista\categoria_documentos/index.php">Categoría Documentos</a>
                <a class="dropdown-item" href="..\..\vista\contrato/index.php">Contratos</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">person</i> Personas
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="..\..\vista\personaltecnico/index.php">Personal Técnico</a>
                <a class="dropdown-item" href="..\..\vista\prensa/index.php">Prensa</a>
                <a class="dropdown-item" href="..\..\vista\usuario/index.php">Usuarios</a>
              </div>
            </li>
          </ul>
      </div>
  </div>
</nav>
<!-- Fin de barra de navegacion -->
<div class="page-header header-filter" data-parallax="true" style="background-image: url('../assets/img/fondo2.jpg')"></div>
<div class="main main-raised"></div>
