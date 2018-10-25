<?php
require_once('..\..\Negocio/ClassDetallePartido.php');
$detalle_partido=new Detalle();
$datadpCn=$detalle_partido->selectTemporada($_GET['id']);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Partidos -  <?php echo $datadpCn['descripcion']?></title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnav.php';
    ?>
    <div class="main main-raised">
    <br>
    <div class="container text-center">
        <h1><?php echo $datadpCn['descripcion']?></h1>
    </div>
    <br>
    <div class="container">
    <div class="row" >
        <div class="col-md-8">
            <div class="table-responsive ">
                <table class="table table-sm text-center" >
                    <thead class=" text-primary">
                        <th >
                            <h2 class="title">Xelajú MC</h2>
                            
                        </th>
                        <th >
                            <h3 class="title">Resultados</h3>
                        </th>
                    </thead>
                    <tbody >
                        <tr >
                            <td>
                            <h4><b>Esquinas </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['esquinas']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><b>Faltas </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['faltas']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><b>Asistencias </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['asistencias']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><b>Tiros </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['tiros']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><b>Tiros a puerta</b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['tiros_puerta']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><b>Tarjetas amarillas </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['ta']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><b>Tarjetas rojas </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['tr']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><b>Fueras de juego </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['fj']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><b>Cambios </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['cam']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><b>Goles </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['gol']?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <h4><b>Expulsados </b> </h4>
                            </td>
                            <td>
                            <h4><?php echo $datadpCn['exp']?></h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
            <br>
            </div>
        </div>
    </div>
    </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
  </body>
</html>
