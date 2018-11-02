<?php
require_once('../../Negocio/ClassDetallePartido.php');
$detalle_partido=new Detalle();
$datadp=$detalle_partido->selectXela($_GET['id']);
$datadpCn=$detalle_partido->selectContrario($_GET['id'],$_GET['id2']);

require_once('../../Negocio/ClassPersonalTecnico.php');
$personal=new PersonalTecnico();
$data=$personal->select($_GET['id']);
$link='../../vista/personaltecnico/insert.php?id='.$_GET['id'];
$btn='Asignar personal técnico'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Resultados - Xelajú MC - <?php echo $datadp['id_partido']?></title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '../layoults/barnavLogged.php';
    ?>
    <input type="hidden" id="mensaje" name="secret" value="<?php if ($_SESSION['mensaje']!="") {
      echo $_SESSION['mensaje'];
      $_SESSION['mensaje']="";
    } ?>">

    <div class="main main-raised">
    <br>
    <div class="container">
        <h1 class="text-center">Resultados</h1>
    </div>
    <br>
    <div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-sm text-center" >
                    <thead class=" text-primary">
                        <th>
                            <h2 class="title">Xelajú MC</h2>
                        </th>
                        <th>
                            <h3 class="title"></h3>
                        </th>
                        <th>
                            <h2 class="title"><?php echo $datadpCn['equipo']?></h2>
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                            <h4><?php echo $datadp['faltas']?></h4>
                            </td>
                            <td>
                            <h4><b>Faltas </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['faltas']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><?php echo $datadp['esquinas']?></h4>
                            </td>
                            <td>
                            <h4><b> Esquinas </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['esquinas']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><?php echo $datadp['asistencias']?></h4>
                            </td>
                            <td>
                            <h4><b>Asistencias </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['asistencias']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><?php echo $datadp['tiros']?></h4>
                            </td>
                            <td>
                            <h4><b>Tiros </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['tiros']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><?php echo $datadp['tiros_puerta']?></h4>
                            </td>
                            <td>
                            <h4><b>Tiros a puerta</b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['tiros_puerta']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><?php echo $datadp['tarjeta_amarilla']?></h4>
                            </td>
                            <td>
                            <h4><b>Tarjetas amarillas </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['tarjeta_amarilla']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><?php echo $datadp['tarjeta_roja']?></h4>
                            </td>
                            <td>
                            <h4><b>Tarjetas rojas </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['tarjeta_roja']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><?php echo $datadp['fuera_juego']?></h4>
                            </td>
                            <td>
                            <h4><b>Fueras de juego </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['fuera_juego']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><?php echo $datadp['cambios']?></h4>
                            </td>
                            <td>
                            <h4><b>Cambios </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['cambios']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><?php echo $datadp['goles']?></h4>
                            </td>
                            <td>
                            <h4><b>Goles </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['goles']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><?php echo $datadp['expulsados']?></h4>
                            </td>
                            <td>
                            <h4><b>Expulsados </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['expulsados']?></h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <br>
            <br>
            <br>
            <br>
            <div class="row text-center">
                        <div class="col-md-8">
                            <a href="<?php echo '../../vista/estadisticaJugador/index.php?partido='.$_GET['id'];?>">
                            <button class="btn btn-success btn-round"><i class="fas fa-notes-medical fa-lg"></i> Estadísticas por jugador</button></a>
                        </div>
                        <div class="col-md-8">
                            <a href="../../vista/detalle_partido/update.php?id=<?php echo $datadp['id_partido']?>&id2=<?php echo $datadpCn['id_equipo']?>">
                            <button class="btn btn-info btn-round"><i class="fas fa-notes-medical fa-lg"></i> Modificar resultados</button></a>
                        </div>
                        <div class="col-md-7">
                            <a href="../../vista/partido/index.php">
                            <button class="btn btn-default btn-round"><i class="fas fa-undo-alt fa-lg"></i> Regresar</button></a>
                        </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <h1>Personal técnico</h1>
    </div>
    <br>
    <div class="container">
        <div class="row">
        <div class="col-md-8">
      <?php
          $result = mysqli_num_rows($data);
          if($result>0)
          {
            $link='../../vista/personaltecnico/update.php?id='.$_GET['id'];
            $btn='Actualizar personal técnico'
         ?>

        <div class="table-responsive">
            <table id="tablapartido" class="table table-sm text-center" >
                <tbody>
                <?php
                    while ($row=mysqli_fetch_array($data))
                    {
                    ?>
                    <tr>
                        <td>
                        <h4><b><?php echo $row['cargo']?></b></h4>

                        </td>
                        <td>
                        <h4><?php echo $row['nombre'] ?></h4>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
            <?php
            }else
            {
            ?>
            <h2>No se asignó ningún personal</h2>
            </div>

            <?php

            }
            ?>

        <div class="col-md-4">
            <div class="row" style="padding:20px">
                <div class="col-md-3">
                    <div>
                        <a href="<?php echo $link?>">
                        <button class="btn btn-info btn-round"><i class="fas fa-notes-medical fa-lg"></i>  <?php echo $btn ?></button>
                    </div>
                    <div>
                        <a href="../../vista/partido/index.php">
                        <button class="btn btn-default btn-round"><i class="fas fa-undo-alt fa-lg"></i> Regresar</button>
                    </div>
                </div>
            <br>
            </div>
        </div>
    </div>
    </div>
    </div>
    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
    <script type="text/javascript">
      $(document).ready(function(){
        if ($('#mensaje').val()!="") {
        alertify.success($('#mensaje').val());
      }
      });
    </script>
  </body>
</html>
