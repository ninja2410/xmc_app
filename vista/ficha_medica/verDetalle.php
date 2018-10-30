<?php
require_once('..\..\Negocio/ClassFichaMedica.php');
$fichamedica=new FichaMedica();
$data=$fichamedica->select($_GET['id']);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Detalle de ficha médica</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnavLogged.php';
    ?>
    <div class="main main-raised">
        <div class="container">
            <div class="row" style="padding:20px">
                <div class="col-md-9">
                    <h3 class="title">Revisión de: <?php echo $data['Nombre']?></h3>
                    <h4><b>Fecha de la revisión: </b><?php echo date("d/m/Y", strtotime($data['fecha']));?></h4>
                    <div class="row">
                        <div class="col-md-4">
                            <h4><b>Porcentaje de grasa: </b><?php echo $data['grasa']?>%</h4>
                        </div>
                        <div class="col-md-4">
                            <h4><b>Peso: </b><?php echo $data['peso']?> libras / <?php echo number_format($data['peso']/2.205, 2, '.', ',')?> kilogramos</h4>
                        </div>
                        <div class="col-md-4">
                            <h4><b>Talla: </b><?php echo $data['talla']?> centímetros</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link btnAzul" href="..\..\vista\ficha_medica/update.php?id=<?php echo $data['id_ficha']; ?>">
                                <i class="material-icons fa-2x">edit</i><br> Actualizar información
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btnAzul" href="..\..\vista\ficha_medica/index.php">
                                <i class="fas fa-undo-alt fa-2x"></i><br> Regresar
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <h3 class="title text-center">Resultados de las pruebas</h3>
            <hr>
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">Signos vitales</h4>
                        </div>
                        <div class="row">
                        <?php include_once('..\..\Negocio/ClassCampo.php');
                            $campo=new Campo();
                            $data2=$campo->listCamposEdit(1,$data['id_ficha']);
                            while ($row = mysqli_fetch_array($data2)){
                            ?>
                            <div class="form-group col-md-4">
                                <h5><b><?php echo $row['NOMBRE'] ?>: </b><?php echo $row['VALOR'];?></h5>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">Criometría/Antropometría</h4>
                        </div>
                        <div class="row">
                        <?php include_once('..\..\Negocio/ClassCampo.php');
                            $campo=new Campo();
                            $data2=$campo->listCamposEdit(2,$data['id_ficha']);
                            while ($row = mysqli_fetch_array($data2)){
                            ?>
                            <div class="form-group col-md-4">
                                <h5><b><?php echo $row['NOMBRE'] ?>: </b><?php echo $row['VALOR'];?></h5>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">Evaluación de rodilla</h4>
                        </div>
                        <div class="row">
                        <?php include_once('..\..\Negocio/ClassCampo.php');
                            $campo=new Campo();
                            $data2=$campo->listCamposEdit(3,$data['id_ficha']);
                            while ($row = mysqli_fetch_array($data2)){
                            ?>
                            <div class="form-group col-md-4">
                                <h5><b><?php echo $row['NOMBRE'] ?>: </b><?php echo $row['VALOR'];?></h5>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">Evaluación de tobillo</h4>
                        </div>
                        <div class="row">
                        <?php include_once('..\..\Negocio/ClassCampo.php');
                            $campo=new Campo();
                            $data2=$campo->listCamposEdit(4,$data['id_ficha']);
                            while ($row = mysqli_fetch_array($data2)){
                            ?>
                            <div class="form-group col-md-4">
                                <h5><b><?php echo $row['NOMBRE'] ?>: </b><?php echo $row['VALOR'];?></h5>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">Meniscos</h4>
                        </div>
                        <div class="row">
                        <?php include_once('..\..\Negocio/ClassCampo.php');
                            $campo=new Campo();
                            $data2=$campo->listCamposEdit(5,$data['id_ficha']);
                            while ($row = mysqli_fetch_array($data2)){
                            ?>
                            <div class="form-group col-md-4">
                                <h5><b><?php echo $row['NOMBRE'] ?>: </b><?php echo $row['VALOR'];?></h5>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">Músculos</h4>
                        </div>
                        <div class="row">
                        <?php include_once('..\..\Negocio/ClassCampo.php');
                            $campo=new Campo();
                            $data2=$campo->listCamposEdit(6,$data['id_ficha']);
                            while ($row = mysqli_fetch_array($data2)){
                            ?>
                            <div class="form-group col-md-4">
                                <h5><b><?php echo $row['NOMBRE'] ?>: </b><?php echo $row['VALOR'];?></h5>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">Alineamiento postular</h4>
                        </div>
                        <div class="row">
                        <?php include_once('..\..\Negocio/ClassCampo.php');
                            $campo=new Campo();
                            $data2=$campo->listCamposEdit(7,$data['id_ficha']);
                            while ($row = mysqli_fetch_array($data2)){
                            ?>
                            <div class="form-group col-md-4">
                                <h5><b><?php echo $row['NOMBRE'] ?>: </b><?php echo $row['VALOR'];?></h5>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">Cuello</h4>
                        </div>
                        <div class="row">
                        <?php include_once('..\..\Negocio/ClassCampo.php');
                            $campo=new Campo();
                            $data2=$campo->listCamposEdit(8,$data['id_ficha']);
                            while ($row = mysqli_fetch_array($data2)){
                            ?>
                            <div class="form-group col-md-4">
                                <h5><b><?php echo $row['NOMBRE'] ?>: </b><?php echo $row['VALOR'];?></h5>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">Pecho</h4>
                        </div>
                        <div class="row">
                        <?php include_once('..\..\Negocio/ClassCampo.php');
                            $campo=new Campo();
                            $data2=$campo->listCamposEdit(9,$data['id_ficha']);
                            while ($row = mysqli_fetch_array($data2)){
                            ?>
                            <div class="form-group col-md-4">
                                <h5><b><?php echo $row['NOMBRE'] ?>: </b><?php echo $row['VALOR'];?></h5>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">Subescapular</h4>
                        </div>
                        <div class="row">
                        <?php include_once('..\..\Negocio/ClassCampo.php');
                            $campo=new Campo();
                            $data2=$campo->listCamposEdit(10,$data['id_ficha']);
                            while ($row = mysqli_fetch_array($data2)){
                            ?>
                            <div class="form-group col-md-4">
                                <h5><b><?php echo $row['NOMBRE'] ?>: </b><?php echo $row['VALOR'];?></h5>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">Supraespinal</h4>
                        </div>
                        <div class="row">
                        <?php include_once('..\..\Negocio/ClassCampo.php');
                            $campo=new Campo();
                            $data2=$campo->listCamposEdit(11,$data['id_ficha']);
                            while ($row = mysqli_fetch_array($data2)){
                            ?>
                            <div class="form-group col-md-4">
                                <h5><b><?php echo $row['NOMBRE'] ?>: </b><?php echo $row['VALOR'];?></h5>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">Abdominal</h4>
                        </div>
                        <div class="row">
                        <?php include_once('..\..\Negocio/ClassCampo.php');
                            $campo=new Campo();
                            $data2=$campo->listCamposEdit(12,$data['id_ficha']);
                            while ($row = mysqli_fetch_array($data2)){
                            ?>
                            <div class="form-group col-md-4">
                                <h5><b><?php echo $row['NOMBRE'] ?>: </b><?php echo $row['VALOR'];?></h5>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">Otra</h4>
                        </div>
                        <div class="row">
                        <?php include_once('..\..\Negocio/ClassCampo.php');
                            $campo=new Campo();
                            $data2=$campo->listCamposEdit(13,$data['id_ficha']);
                            while ($row = mysqli_fetch_array($data2)){
                            ?>
                            <div class="form-group col-md-4">
                                <h5><b><?php echo $row['NOMBRE'] ?>: </b><?php echo $row['VALOR'];?></h5>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
  </body>
</html>
