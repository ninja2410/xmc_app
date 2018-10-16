<?php
require_once('..\..\Negocio/ClassDatoPartido.php');
require_once('..\..\Negocio/ClassJugador.php');
require_once('..\..\Negocio/ClassEstadisticaJugador.php');
$datoPartido=new DatoPartido();
$dato=$datoPartido->select(-1);
$jugador=new Jugador();
$jugadores=$jugador->select(-1);
$estadistica=new EstadisticaJugador();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Estadísticas por jugador - Listar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnav.php';
    ?>
    <div class="main main-raised">
    <div class="content">
      <div class="container-fluid">

          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-danger">
                <div class="col-lg-10" style="float:left;">
                  <h2 class="card-title ">ESTADÍSTICAS</h4>
                  <p class="card-category"> Información de estadísticas de jugador</p>
                </div>
                <div class="col-lg-1" style="float:left">
                  <a href="..\..\vista\estadisticaJugador/insert.php" title="Agregar nueva estadistica">
                    <div class="card-header card-header-success card-header-icon" style="float:right">
                      <div class="card-icon">
                        <i class="material-icons">add</i>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-info">
                      <th>
                        ID
                      </th>
                      <th>
                        Nombre
                      </th>
                      <?php
                      foreach ($dato as $key => $value) {
                        ?>
                        <th style="text-align:center;"> <?php echo $value['nombre']; ?> </th>
                        <?php
                      }
                       ?>

                    </thead>
                    <tbody>
                      <?php
                      foreach ($jugadores as $key => $val) {
                        ?>
                        <tr>
                          <td><?php echo $val['id_jugador']; ?></td>
                          <td><?php echo $val['Nombre']; ?></td>
                          <?php
                          foreach ($dato as $key => $dt) {
                            $row=$estadistica->buscarDato($dt['id_dato_partido'], $_GET['partido'], $val['id_jugador']);
                            $result=$row['valor'];
                            ?>
                            <td style="text-align:center;"  <?php
                            ?>
                            <?php if ($result!=''): ?>
                              rel="tooltip" title="Min:<?php echo $row['minuto']; ?>"
                            <?php endif; ?>
                            <?php
                             ?>><?php
                            if ($result=='') {
                              echo "0";
                            }
                            else{
                              echo $result;
                            }
                            ?></td>
                            <?php
                          }
                           ?>
                        </tr>
                        <?php
                      }
                       ?>
                    </tbody>
                  </table>
                </div>
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
