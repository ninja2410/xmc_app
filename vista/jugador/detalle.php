<?php
require_once('..\..\Negocio/ClassJugador.php');
$jugador=new Jugador();
$data=$jugador->select($_GET['id']);

function calculaedad($fechanacimiento){
	list($ano,$mes,$dia) = explode("-",$fechanacimiento);
	$ano_diferencia  = date("Y") - $ano;
	$mes_diferencia = date("m") - $mes;
	$dia_diferencia   = date("d") - $dia;
	if ($dia_diferencia < 0 || $mes_diferencia < 0)
		$ano_diferencia--;
	return $ano_diferencia;
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Jugador - <?php echo $data['nombre']." ".$data['apellido'] ?></title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnav.php';
    ?>
    <div class="main main-raised">
        <div class="container">
            <div class="row" style="padding:20px">
                <div class="col-md-2">
                    <img src="../assets/img/examples/mariya-georgieva.jpg" alt="Raised Image" class="img-raised rounded img-fluid">
                </div>
                <div class="col-md-7">
                    <h3 class="title"><?php echo $data['nombre']." ".$data["apellido"]?></h3>
                    <h4><b>Edad: </b><?php echo calculaedad ($data['fecha_nacimiento']);?></h4>
                    <h4><b>Fecha de nacimiento: </b><?php echo date("d/m/Y", strtotime($data['fecha_nacimiento']));?></h4>
                    <h4><b>Direccion: </b><?php echo $data['direccion']?></h4>
                    <h4><b>Nombre del padre: </b><?php echo $data['padre']?></h4>
                    <h4><b>Nombre de la madre: </b><?php echo $data['madre']?></h4>
                    <h4><b>Numero de telefono: </b><?php echo $data['telefono']?></h4>
                    <h4><b>Procedencia: </b><?php echo $data['procedencia']?></h4>
                </div>
                <div class="col-md-3">
                    <div>
                        <a href="..\..\vista\ficha_medica/index.php">
                        <button class="btn btn-info btn-round"><i class="fas fa-notes-medical fa-lg"></i> Ver información medica</button>
                    </div>
                    <div>
                        <a href="..\..\vista\jugador/index.php">
                        <button class="btn btn-info btn-round"><i class="fas fa-portrait fa-lg"></i> Ver estadisticas del jugador</button>
                    </div>
                    <div>
                        <a href="..\..\vista\jugador/update.php?id=<?php echo $data['id_jugador']; ?>">
                        <button class="btn btn-warning btn-round"><i class="material-icons">edit</i> Actualizar información</button>
                    </div>
                    <div>
                        <form class="" action="..\..\vista\jugador/store.php" method="post">
                            <input type="hidden" name="operation" value="3">
                            <input type="hidden" name="id" value="<?php echo $data['id_jugador']; ?>">
                            <button class="btn btn-danger btn-round"><i class="material-icons">delete</i> Desactivar jugador</button>
                        </form>
                    </div>
                    <div>
                        <a href="..\..\vista\jugador/index.php?>">
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
