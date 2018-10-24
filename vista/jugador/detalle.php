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
                    <img src="../imagenes/jugadores/<?php echo $data['foto']?>" alt="Circle Image" class="img-circle rounded img-fluid">
                </div>
                <div class="col-md-7">
                    <h3 class="title"><?php echo $data['nombre']." ".$data["apellido"]?></h3>
                    <h4><b>Categoría: </b><?php echo $data['categoria']?></h4>
                    <h4><b>Edad: </b><?php echo calculaedad ($data['fecha_nacimiento']);?></h4>
                    <h4><b>Tipo de sangre: </b><?php echo $data['sangre']?></h4>
                    <h4><b>Número de camisola: </b><?php echo $data['camisola']?></h4>
                    <h4><b>Fecha de nacimiento: </b><?php echo date("d/m/Y", strtotime($data['fecha_nacimiento']));?></h4>
                    <h4><b>Dirección: </b><?php echo $data['direccion']?></h4>
                    <h4><b>Nombre del padre: </b><?php echo $data['padre']?></h4>
                    <h4><b>Nombre de la madre: </b><?php echo $data['madre']?></h4>
                    <h4><b>Número de teléfono: </b><?php echo $data['telefono']?></h4>
                    <h4><b>Procedencia: </b><?php echo $data['procedencia']?></h4>
                    <h4><b>Posición: </b><?php echo $data['descripcion']?></h4>
                    <?php
                        // if ($data['id_contrato'] == null) {
                        //     echo '<h4><b>Tiene contrato: </b>No</h4>';
                        // }
                        // else
                        // {
                        //     echo '<h4><b>Tiene contrato: </b>Si</h4>';
                        // }
                        
                    ?>
                </div>
                <div class="col-md-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link btnAzul" href="..\..\vista\jugador/index.php">
                                <i class="fas fa-portrait fa-2x"></i><br> Ver estadísticas del jugador
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btnAzul" href="..\..\vista\ficha_medica/index.php">
                                <i class="fas fa-notes-medical fa-2x"></i><br> Ver información médica
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btnAzul" href="..\..\vista\jugador/update.php?id=<?php echo $data['id_jugador']; ?>">
                                <i class="material-icons fa-2x">edit</i><br> Actualizar información
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btnAzul" href="..\..\vista\jugador/index.php">
                                <i class="fas fa-undo-alt fa-2x"></i><br> Regresar
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
  </body>
</html>
