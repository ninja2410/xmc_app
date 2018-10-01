<?php
require_once('..\..\Negocio/ClassDetallePartido.php');
$detalle_partido=new Detalle();
$data=$detalle_partido->selectXela($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Resultados - Xelaju - <?php echo $data['id_partido']?></title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnav.php';
    ?>
    <div class="main main-raised">
        <div class="container">
            <div class="row" style="padding:20px">
                <div class="col-md-7">
                    <h3 class="title"><?php echo $data['id_equipo']?></h3>
                    <h4><b>Faltas: </b> <?php echo $data['faltas']?></h4>
                    <h4><b>Asistencias: </b>    <?php echo $data['asistencias']?></h4>
                    <h4><b>Tiros: </b><?php echo $data['tiros']?></h4>
                    <h4><b>Tiros a puerta: </b><?php echo $data['tiros_puerta']?></h4>
                    <h4><b>Tarjetas amarillas: </b><?php echo $data['tarjeta_amarilla']?></h4>
                    <h4><b>Tarjetas rojas: </b><?php echo $data['tarjeta_roja']?></h4>
                    <h4><b>Fuera de juego: </b><?php echo $data['fuera_juego']?></h4>
                    <h4><b>Cambios: </b><?php echo $data['cambios']?></h4>
                    <h4><b>Goles: </b><?php echo $data['goles']?></h4>
                    <h4><b>Expulsados: </b><?php echo $data['expulsados']?></h4>
                </div>
                <div class="col-md-3">
                    <div>
                        <a href="..\..\vista\detalle_partido/update.php?id=<?php echo $data['id_partido']?>">
                        <button class="btn btn-info btn-round"><i class="fas fa-notes-medical fa-lg"></i>Modificar resultados</button>
                    </div>
                    <div>
                        <a href="..\..\vista\partido/index.php">
                        <button class="btn btn-default btn-round"><i class="fas fa-undo-alt fa-lg"></i> Regresar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
  </body>
</html>
