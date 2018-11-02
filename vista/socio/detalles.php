<?php
require_once('../../Negocio/ClassSocio.php');
$socio=new Socio();
$data=$socio->select($_GET['id']);

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
    <title>Socio - Detalles <?php echo $data['nombre']." ".$data['apellido'] ?></title>
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
                    <?php
                    echo '<img alt="Circle Image" class="img-circle rounded img-fluid"  src="../imagenes/sc/'.$data['foto'].'" class="img-fluid">';
                    ?>
                </div>
                <div class="col-md-7">
                    <h2 class="title"><?php echo $data['nombre']." ".$data["apellido"]?></h2>
                    <h3>Datos personales</h3>
                    <hr>
                    <h4><b>Edad: </b><?php echo calculaedad ($data['fecha_nacimiento']);?> años</h4>
                    <h4><b>Fecha de nacimiento: </b><?php echo date("d/m/Y", strtotime($data['fecha_nacimiento']));?></h4>
                    <h4><b>Teléfono: </b><?php echo $data['telefono']?></h4>
                    <h4><b>Dirección de domicilio: </b><?php echo $data['direccion_domicilio']?></h4>
                    <h4><b>DPI: </b><?php echo $data['DPI']?></h4>
                    <h3>Datos técnicos</h3>
                    <hr>
                    <h4><b>Email: </b><?php echo $data['email']?></h4>
                    <h4><b>Dirección de cobro: </b><?php echo $data['direccion_cobro']?></h4>
                    <h4><b>Fecha de registro: </b><?php echo date("d/m/Y", strtotime($data['fecha_registro']));?></h4>

                    <input type="hidden" value="<?php echo $data['id_socio']; ?>">
                    <!-- <h4><b >Contrato: </b><a href="../../vista/documento_digital/index.php">< ?php echo $data['titulo']?></a></h4> -->
                </div>

                <div class="col-md-3">
                    <ul class="nav flex-column">
                    <li class="nav-item">
                            <a class="nav-link btnAzul" href="../../vista/socio/documentos.php?id=<?php echo $data['id_socio']; ?>">
                                <i class="material-icons fa-2x">book</i><br> Documentos
                            </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link btnAzul" href="../../vista/socio/update.php?id=<?php echo $data['id_socio']; ?>">
                                <i class="material-icons fa-2x">edit</i><br> Actualizar información
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btnAzul" href="../../vista/socio/index.php">
                                <i class="fas fa-undo-alt fa-2x"></i><br> Regresar
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
  </body>
</html>
