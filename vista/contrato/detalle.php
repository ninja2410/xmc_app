<?php
require_once('../../Negocio/ClassContrato.php');
$contrato=new Contrato();
$data=$contrato->select($_GET['id']);
?>

<?php
require_once('../../Negocio/ClassDocumento.php');
$documento=new Documento();
$data2=$documento->select($_GET['id']);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contrato - <?php echo $data['titulo'] ?></title>
    <?php include '../layoults/headers2.php'; ?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chocolat/0.4.20/css/chocolat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chocolat/0.4.20/css/chocolat.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chocolat/0.4.20/css/chocolat.min.css.map">
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '../layoults/barnav.php';
    ?>
    <div class="main main-raised">
        <div class="container">
            <div class="row" style="padding:20px">
            <div class="chocolat-parent" data-chocolat-title="Documento" id="print">
                      <a class="chocolat-image" href="../imagenes/<?php echo $data['path']; ?>" title="<?php echo $data['descripcion']; ?>">
                        <img src="../imagenes/<?php echo $data['path']; ?>" style="width: 100; height: 150px;" alt="">
                      </a>
                      <div class="col-md-4">
                    <input type="button" class="btn btn-danger pull-left btn-round" onclick="printDiv('print')" value="Imprimir" />
                  </div>
            </div>
            
                <div class="col-md-7">
                <h4><b>Título del contrato: </b><?php echo $data['titulo']?></h4>
                <h4><b>Fecha de inicio: </b><?php echo date("d/m/Y", strtotime($data['fecha_inicio']));?></h4>
                <h4><b>Fecha final: </b><?php echo date("d/m/Y", strtotime($data['fecha_final']));?></h4>
                <h4><b>Salario: </b>Q<?php echo $data['salario']?></h4>
                <h4><b>Fecha de creación: </b><?php echo date("d/m/Y", strtotime($data['fecha_creacion']));?></h4>
                <h4><b>Descripción: </b><?php echo $data['descripcion']?></h4>
                </div>

                <div class="col-md-3 text-center">
                    <ul class="nav  flex-column">
                        <li class="nav-item">
                            <a class="nav-link btnAzul" href="../../vista/contrato/update.php?id=<?php echo $data['id_contrato']; ?>">
                                <i class="material-icons">edit</i> Actualizar información
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btnAzul" href="../../vista/contrato/index.php">
                                <i class="fas fa-undo-alt fa-lg"></i> Regresar
                            </a>
                        </li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chocolat/0.4.20/js/jquery.chocolat.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chocolat/0.4.20/js/jquery.chocolat.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $('.chocolat-parent').Chocolat();
    });
    function printDiv(nombreDiv) {
     var contenido= document.getElementById(nombreDiv).innerHTML;
     var contenidoOriginal= document.body.innerHTML;

     document.body.innerHTML = contenido;

     window.print();

     document.body.innerHTML = contenidoOriginal;
    }

    </script>
  </body>
</html>
