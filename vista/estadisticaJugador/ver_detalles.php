<?php

require_once('../../Negocio/ClassDatoPartido.php');
require_once('../../Negocio/ClassJugador.php');
require_once('../../Negocio/ClassEstadisticaJugador.php');
$datoPartido=new DatoPartido();
$dato=$datoPartido->select(-1);
$jugadorC=new Jugador();
$jugador=$jugadorC->select($_GET['id']);
$estadistica=new EstadisticaJugador();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Jugador - <?php echo $jugador['nombre']." ".$jugador['apellido'] ?></title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '../layoults/barnavLogged.php';
    ?>
    <div class="main main-raised">
        <div class="container">
            <div class="row" style="padding:20px">
                <div class="col-md-2">
                    <img src="../imagenes/jugadores/<?php echo $jugador['foto']?>" alt="Circle Image" class="img-circle rounded img-fluid">
                </div>
                <div class="col-md-7">
                    <h3 class="title"><?php echo $jugador['nombre']." ".$jugador["apellido"]?></h3>
                    <h3>Detalle estadisticas temporada: </h3>
                    <hr>
										<?php foreach ($dato as $key => $d): ?>
											<h4> <b> <?php echo $d['nombre']; ?>: </b><?php
											$row=$estadistica->buscarDato($d['id_dato_partido'], $_GET['partido'], $jugador['id_jugador']);
											if ($row['valor']=="") {
												echo "0";
											}
											else{
												echo $row["valor"];
											}
											 ?></h4>
										<?php endforeach; ?>
                      <h3>Datos técnicos</h3>
                    <hr>
                    <h4><b>Categoría: </b><?php echo $jugador['categoria']?></h4>
                    <h4><b>Número de camisola: </b><?php echo $jugador['camisola']?></h4>
                    <h4><b>Posición: </b><?php echo $jugador['descripcion']?></h4>
                    <h4><b>Fecha de inicio: </b><?php echo date("d/m/Y", strtotime($jugador['fecha_inicio']));?></h4>
                    <h4><b>Fecha final: </b><?php echo date("d/m/Y", strtotime($jugador['fecha_final']));?></h4>
                </div>
            </div>
        </div>
    </div>
    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
  </body>
</html>
