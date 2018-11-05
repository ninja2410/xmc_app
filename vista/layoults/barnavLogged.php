<?php
session_start();

$now = time();

if(isset($_SESSION['expire']))
{
  if($now > $_SESSION['expire'])
  {
    session_destroy();
    $_SESSION['expired']=true;
    header("Location: ../login/login.php");
    $jugadores=0;
  }
}

if(!isset($_SESSION['iniciado']))
{
   header("Location: ../login/login.php");
   $jugadores=0;
}else
{
  require_once('../../Negocio/ClassUsuario.php');
  $partido=new Usuario();
  $data2=$partido->selectPermisoUsuario($_SESSION['id']);
  $permisos = array();
  while ($row=mysqli_fetch_array($data2))
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
$admin=0;
$arbitro=0;
$entrenadores=0;
$pt=0;
$prensa=0;
foreach($permisos as $key => $value)
{
  if($value==1)
  {
    $jugadores=1;
  }
  if($value==2)
  {
    $partidos=1;
  }
  if($value==3)
  {
    $socios=1;
  }
  if($value==4)
  {
    $lesiones=1;
  }
  if($value==5)
  {
    $documentos=1;
  }
  if($value==6)
  {
    $admin=1;

  }
  if($value==8)
  {
    $prensa=1;
    $personas=1;
  }
  if($value==9)
  {
    $arbitro=1;
    $personas=1;
  }
  if($value==10)
  {
    $entrenadores=1;
    $personas=1;
  }
  if($value==11)
  {
    $pt=1;
    $personas=1;
  }
}


?>

<!-- Inicio de Barra de navegacion -->

<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg"  color-on-scroll="100">
  <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="../../vista/home/index.php">
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
              <i class="fas fa-users fa-lg"></i> Jugadores
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../../vista/jugador/index.php">Jugadores</a>
                <a class="dropdown-item" href="../../vista/categoria/index.php">Categorías</a>
                <a class="dropdown-item" href="../../vista/fallas/index.php">Multas</a>
              </div>
            </li>
            <?php
            }
            if($partidos==1)
            {
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-futbol fa-lg"></i> Partidos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../../vista/equipo/index.php">Equipos</a>

                <a class="dropdown-item" href="../../vista/estadio/index.php">Estadios</a>
                <a class="dropdown-item" href="../../vista/temporada/index.php">Temporadas</a>
                <a class="dropdown-item" href="../../vista/alineacion/index.php">Alineaciones</a>
                <a class="dropdown-item" href="../../vista/partido/index.php">Registro de partidos</a>
              </div>
            </li>
            <?php
            }
            if($socios==1)
            {
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-lock fa-lg"></i> Socios
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../../vista/pagos/index.php">Pagos</a>
                <a class="dropdown-item" href="../../vista/beneficio/index.php">Beneficios</a>
                <a class="dropdown-item" href="../../vista/membresia/index.php">Membresías</a>
                <a class="dropdown-item" href="../../vista/pagos/rpt_socios.php">Estado de pagos</a>
                <a class="dropdown-item" href="../../vista/socio/index.php">Registro de socios</a>
              </div>
            </li>
            <?php
            }
            if($lesiones==1)
            {
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-briefcase-medical fa-lg"></i> Lesiones
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../../vista/medico/index.php">Médicos</a>
                <a class="dropdown-item" href="../../vista/ficha_medica/index.php">Ficha médica</a>
                <a class="dropdown-item" href="../../vista/parte_cuerpo/index.php">Detalles de ficha médica</a>
                <a class="dropdown-item" href="../../vista/lesion/index.php">Lesiones</a>
                <a class="dropdown-item" href="../../vista/lesion-jugador/index.php">Registro de lesiones por jugador</a>
              </div>
            </li>
            <?php
            }
            if($documentos==1)
            {
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-file-alt fa-lg"></i> Documentos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../../vista/documento_digital/index.php">Documentos digitales</a>
                <a class="dropdown-item" href="../../vista/categoria_documentos/index.php">Categoría documentos</a>
              </div>
            </li>
            <?php
            }
            if($personas==1)
            {
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-address-card fa-lg"></i> Personas
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <?php
            if($prensa==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/prensa/index.php">Prensa</a>
                <?php
            }
            if($arbitro==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/arbitro/index.php">Árbitros</a>
            <?php
            }
            if($entrenadores==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/entrenador/index.php">Entrenadores</a>
            <?php
            }
            if($pt==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/personaltecnico/index.php">Personal técnico</a>
            <?php
            }
            ?>
              </div>
            </li>
            <?php
            }
            if($admin==1)
            {
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-circle fa-lg"></i> Administrador
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../../vista/bitacora/index.php">Bitácora</a>
                <a class="dropdown-item" href="../../vista/usuario/index.php">Usuarios</a>

              </div>
            </li>
            <?php
            }
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="far fa-newspaper fa-lg"></i> Noticias
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../../vista/noticia/index.php">Noticias</a>
              </div>
            </li>
            <li class="dropdown nav-item">
              <a href="#pablo" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown">
                <div class="profile-photo-small">
                  <img src="../imagenes/<?php echo $_SESSION['foto'] ?>" alt="Circle Image" class="rounded-circle img-fluid">
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <h6 class="dropdown-header">Opciones de usuario</h6>
                <a class="dropdown-item" href="../../vista/acerca/index.php">Acerca de</a>
                <a href="../../vista/login/salida.php" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>  Cerrar sesión</a>
              </div>
            </li>
          </ul>
      </div>
  </div>
</nav>
<!-- Fin de barra de navegacion -->
<div class="page-header header-filter" data-parallax="true" style="background-image: url('../assets/img/home.png')">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand text-center">
          <h2 class="title">Bienvenido <?php echo $_SESSION['usuario']?></h2>
        </div>
      </div>
    </div>
  </div>
</div>
