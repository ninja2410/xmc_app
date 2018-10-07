<?php
require_once('..\..\Negocio/ClassDetallePartido.php');
$detalle_partido=new Detalle();
$data=$detalle_partido->selectXela($_GET['id']);
$dataCn=$detalle_partido->selectContrario($_GET['id'],$_GET['id2']);
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
    <div class="table-responsive">
            <table id="tablapartido" class="table table-sm text-center" >
                <thead class=" text-primary">
                      <th>
                        <h2 class="title">Xelajú</h2>
                      </th>
                      <th>
                        <h3 class="title"></h3>
                      </th>
                      <th>
                        <h2 class="title"><?php echo $dataCn['equipo']?></h2>
                      </th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        <h4><?php echo $data['faltas']?></h4>
                        </td>
                        <td>
                        <h4><b>Faltas </b> </h4>
                        </td>
                        <td>
                        <h4><?php echo $dataCn['faltas']?></h4>
                        </td>
                    </tr>  
                    <tr>
                        <td>
                        <h4><?php echo $data['asistencias']?></h4>
                        </td>
                        <td>
                        <h4><b>Asistencias </b> </h4>
                        </td>
                        <td>
                        <h4><?php echo $dataCn['asistencias']?></h4>
                        </td>
                    </tr>  
                    <tr>
                        <td>
                        <h4><?php echo $data['tiros']?></h4>
                        </td>
                        <td>
                        <h4><b>Tiros </b> </h4>
                        </td>
                        <td>
                        <h4><?php echo $dataCn['tiros']?></h4>
                        </td>
                    </tr>  
                    <tr>
                        <td>
                        <h4><?php echo $data['tiros_puerta']?></h4>
                        </td>
                        <td>
                        <h4><b>Tiros a puertas</b> </h4>
                        </td>
                        <td>
                        <h4><?php echo $dataCn['tiros_puerta']?></h4>
                        </td>
                    </tr>  
                    <tr>
                        <td>
                        <h4><?php echo $data['tarjeta_amarilla']?></h4>
                        </td>
                        <td>
                        <h4><b>Tarjetas amarillas </b> </h4>
                        </td>
                        <td>
                        <h4><?php echo $dataCn['tarjeta_amarilla']?></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <h4><?php echo $data['tarjeta_roja']?></h4>
                        </td>
                        <td>
                        <h4><b>Tarjetas rojas </b> </h4>
                        </td>
                        <td>
                        <h4><?php echo $dataCn['tarjeta_roja']?></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <h4><?php echo $data['tarjeta_roja']?></h4>
                        </td>
                        <td>
                        <h4><b>Tarjeta amarilla </b> </h4>
                        </td>
                        <td>
                        <h4><?php echo $dataCn['tarjeta_roja']?></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <h4><?php echo $data['fuera_juego']?></h4>
                        </td>
                        <td>
                        <h4><b>Fuera de juego </b> </h4>
                        </td>
                        <td>
                        <h4><?php echo $dataCn['fuera_juego']?></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <h4><?php echo $data['cambios']?></h4>
                        </td>
                        <td>
                        <h4><b>Cambios </b> </h4>
                        </td>
                        <td>
                        <h4><?php echo $dataCn['cambios']?></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <h4><?php echo $data['goles']?></h4>
                        </td>
                        <td>
                        <h4><b>Goles </b> </h4>
                        </td>
                        <td>
                        <h4><?php echo $dataCn['goles']?></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <h4><?php echo $data['expulsados']?></h4>
                        </td>
                        <td>
                        <h4><b>Expulsados </b> </h4>
                        </td>
                        <td>
                        <h4><?php echo $dataCn['expulsados']?></h4>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row text-center">
                     <div>
                        <a href="..\..\vista\detalle_partido/update.php?id=<?php echo $data['id_partido']?>&id2=<?php echo $dataCn['id_equipo']?>">
                        <button class="btn btn-info btn-round"><i class="fas fa-notes-medical fa-lg"></i> Modificar resultados</button></a>
                    </div>
                    <div>
                        <a href="..\..\vista\personaltecnico/insert.php?id=<?php echo $data['id_partido']?>">
                        <button class="btn btn-danger btn-round"><i class="fas fa-notes-medical fa-lg"></i> Asignar personal tecnico</button></a>
                    </div>
                    <div >
                        <a href="..\..\vista\partido/index.php">
                        <button class="btn btn-default btn-round"><i class="fas fa-undo-alt fa-lg"></i> Regresar</button>
                    </div>
        </div>
        <br>
    </div>
    </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
    <script type="text/javascript">
$(document).ready(function() {
    $('#tablapartido').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
    </script>
  </body>
</html>
