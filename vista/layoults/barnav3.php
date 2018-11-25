<?php
 if (session_status() == PHP_SESSION_NONE)
{
  session_start();
}
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
 $DJugadores=0;
$DPartidos=0;
$DLesiones=0;
$DDoc=0;
$PAdmin=0;
$DSocios=0;
$jugadores=0;
$categorias=0;
$multas=0;
$Equipos=0;
$Estadios=0;
$Temporadas=0;
$Alineacion=0;
$reg_partidos=0;
$Pagos=0;
$beneficios=0;
$membresias=0;
$estado_pagos=0;
$partidos=0;
$medicos=0;
$ficha_medica=0;
$detallles_ficha=0;
$lesiones=0;
$lesiones_jugador=0;
$doc_digitales=0;
$cat_digitales=0;
$personas=0;
$bita=0;
$usuarios=0;
$arbitro=0;
$entrenadores=0;
$pt=0;
$prensa=0;
$socios=0;
 foreach($permisos as $key => $value)
{
  if($value==1)
  {
    $jugadores=1;
    $DJugadores=1;
    $_SESSION['jugadores']=true;
  }
  if($value==2)
  {
    $categorias=1;
    $DJugadores=1;
    $_SESSION['jugadores']=true;
  }
  if($value==27)
  {
    $multas=1;
    $DJugadores=1;
    $_SESSION['jugadores']=true;
  }
  if($value==3)
  {
    $Equipos=1;
    $DPartidos=1;
    $_SESSION['partidos']=true;
  }
  if($value==4)
  {
    $Estadios=1;
    $DJugadores=1;
    $_SESSION['partidos']=true;
   }
  if($value==5)
  {
    $Temporadas=1;
    $DJugadores=1;
    $_SESSION['partidos']=true;
   }
  if($value==6)
  {
    $Alineacion=1;
    $DJugadores=1;
    $_SESSION['partidos']=true;
   }
  if($value==8)
  {
    $reg_partidos=1;
    $DJugadores=1;
    $_SESSION['partidos8']=true;
   }
  if($value==9)
  {
    $Pagos=1;
    $DSocios=1;
    $_SESSION['socios']=true;
   }
  if($value==10)
  {
    $beneficios=1;
    $DSocios=1;
    $_SESSION['socios']=true;
   }
  if($value==11)
  {
    $membresias=1;
    $DSocios=1;
    $_SESSION['socios']=true;
   }
  if($value==12)
  {
    $estado_pagos=1;
    $DSocios=1;
    $_SESSION['socios']=true;
   }
  if($value==13)
  {
    $socios=1;
    $DSocios=1;
    $_SESSION['socios']=true;
   }
  if($value==14)
  {
    $medicos=1;
    $DLesiones=1;
    $_SESSION['medicos']=true;
  }
  if($value==15)
  {
    $ficha_medica=1;
    $DLesiones=1;
    $_SESSION['medicos']=true;
   }
  if($value==16)
  {
    $detallles_ficha=1;
    $DLesiones=1;
    $_SESSION['medicos']=true;
   }
  if($value==17)
  {
    $lesiones=1;
    $DLesiones=1;
    $_SESSION['medicos']=true;
   }
  if($value==18)
  {
    $lesiones_jugador=1;
    $DLesiones=1;
    $_SESSION['medicos']=true;
   }
  if($value==19)
  {
    $doc_digitales=1;
    $DDoc=1;
    $_SESSION['doc']=true;
   }
  if($value==20)
  {
    $cat_digitales=1;
    $DDoc=1;
    $_SESSION['doc']=true;
   }
  if($value==21)
  {
    $prensa=1;
    $personas=1;
    $_SESSION['personas']=true;
   }
  if($value==22)
  {
    $arbitro=1;
    $personas=1;
    $_SESSION['personas']=true;
   }
  if($value==23)
  {
    $entrenadores=1;
    $personas=1;
    $_SESSION['personas']=true;
   }
  if($value==24)
  {
    $pt=1;
    $personas=1;
    $_SESSION['personas']=true;
   }
  if($value==25)
  {
    $bitacora=1;
    $PAdmin=1;
    $_SESSION['admin']=true;
   }
  if($value==26)
  {
    $usuarios=1;
    $PAdmin=1;
    $_SESSION['admin']=true;
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
            if($DJugadores==1)
            {
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-users fa-lg"></i> Jugadores
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <?php
            if($jugadores==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/jugador/index.php">Jugadores</a>
            <?php
            }
            if($categorias==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/categoria/index.php">Categorías</a>
            <?php
            }
            if($multas==1)
            {
            ?>
            <a class="dropdown-item" href="../../vista/entrenamiento/index.php">Entrenos</a>
            <?php
            }
            ?>
              </div>
            </li>
            <?php
            }
            if($DPartidos==1)
            {
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-futbol fa-lg"></i> Partidos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
               <?php
             if($Equipos==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/equipo/index.php">Equipos</a>
                <?php
            }
            if($Estadios==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/estadio/index.php">Estadios</a>
                <?php
            }
            if($Temporadas==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/temporada/index.php">Temporadas</a>
                <?php
            }
            if($Alineacion==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/alineacion/index.php">Alineaciones</a>
                <?php
            }
            if($reg_partidos==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/partido/index.php">Registro de partidos</a>
                <?php
            }
            ?>
              </div>
            </li>
            <?php
            }
            if($DSocios==1)
            {
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-lock fa-lg"></i> Socios
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <?php
            if($Pagos==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/pagos/index.php">Pagos</a>
                <?php
            }
            if($beneficios==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/beneficio/index.php">Beneficios</a>
            <?php
            }
            if($membresias==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/membresia/index.php">Membresías</a>
            <?php
            }
            if($estado_pagos==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/pagos/rpt_socios.php">Estado de pagos</a>
            <?php
            }
            if($socios==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/socio/index.php">Registro de socios</a>
           <?php
            }
            ?>
              </div>
            </li>
            <?php
            }
            if($DLesiones==1)
            {
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-briefcase-medical fa-lg"></i> Lesiones
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <?php
             if($medicos==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/medico/index.php">Médicos</a>
                <?php
            }
            if($ficha_medica==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/ficha_medica/index.php">Ficha médica</a>
            <?php
            if($detallles_ficha==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/parte_cuerpo/index.php">Detalles de ficha médica</a>
            <?php
            }
            if($lesiones==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/lesion/index.php">Lesiones</a>
                <?php
            }
            if($lesiones_jugador==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/lesion-jugador/index.php">Registro de lesiones por jugador</a>
                <?php
            }
            ?>
              </div>
            </li>
            <?php
            }
            if($DDoc==1)
            {
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-file-alt fa-lg"></i> Documentos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <?php
            }
            if($doc_digitales==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/documento_digital/index.php">Documentos digitales</a>
            <?php
            }
            if($doc_digitales==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/categoria_documentos/index.php">Categoría documentos</a>
            <?php
            }
            ?>
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
            if($PAdmin==1)
            {
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-circle fa-lg"></i> Administrador
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../../vista/noticia/index.php">Noticias</a>
              <?php
             if($bitacora==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/bitacora/index.php">Bitácora</a>
                <?php
            }
            if($usuarios==1)
            {
            ?>
                <a class="dropdown-item" href="../../vista/usuario/index.php">Usuarios</a>
                <?php
            }
            ?>
              </div>
            </li>
            <?php
            }
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="far fa-newspaper fa-lg"></i> Reportes
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../../vista/jugador/index.php">Jugadores</a>
                <a class="dropdown-item" href="../../vista/temporada/index.php">Temporadas</a>
                <a class="dropdown-item" href="../../vista/prensa/index.php">Noticias</a>
                <a class="dropdown-item" href="../../vista/pagos/rpt_socios.php">Pagos y socios</a>
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