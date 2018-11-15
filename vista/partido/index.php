<?php
require_once('../../Negocio/ClassPartido.php');
$partido=new Partido();
$data=$partido->select(-1);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Partidos - Listar</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '../layoults/barnavLogged.php';
    ?>
    <input type="hidden" id="mensaje" name="secret" value="<?php if ($_SESSION['mensaje']!="") {
      echo $_SESSION['mensaje'];
      $_SESSION['mensaje']="";
    } ?>">
    <div class="main main-raised">
    <div class="content">
            <div class="card col-md-12">
      <div class="container-fluid">

         
              <div class="card-header card-header-danger row">
                <div class="col-md-11">
                  <h3 class="card-title">Partidos</h3>
                  <p class="category">Listado de partidos</p>
                </div>
                <div class="col-md-1 text-right">
                  <a href="../../vista/partido/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar partido">
                    <i class="material-icons">add</i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table1">
                    <thead>
                      <th>
                        ID
                      </th>
                      <th>
                        Fecha
                      </th>
                      <th>
                        Categoría
                      </th>
                      <th>
                        Estadio
                      </th>
                      <th>
                        Contrincante
                      </th>
                      <th>
                        Temporada
                      </th>
                      <th>
                        Observaciones
                      </th>
                      <th>
                        Listados
                      </th>
                      <th>
                        Resultados
                      </th>
                      <th>
                        Acciones
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                        $fecha_actual = date_parse(date("Y-m-d"));
                        $fecha_entrada = date_parse($row['fecha']);
                       ?>
                      <tr>
                        <td>
                          <?php echo $row['id_partido']; ?>
                        </td>
                        <td >
                        <?php if($fecha_entrada>$fecha_actual)
                        {
                        ?>
                          <a>
                              <!-- <button class="btn btn-success btn-round btn-sm"><i class="fas fa-futbol fa-lg"> </i> </button> -->
                              <span class="badge badge-pill badge-success">Próximo </span>
                              <?php echo $row['fecha']?>
                          </a>
                        <?php
                        }
                        ?>
                          <?php if($fecha_entrada<$fecha_actual)
                        {
                        ?>
                          <a>
                          <!-- <button class="btn btn-danger btn-round btn-sm"><i class="fas fa-futbol fa-lg"> </i>  </button> -->
                          <span class="badge badge-pill badge-danger">Jugado </span>
                          <?php echo $row['fecha']?>
                          </a>
                        <?php
                        }
                        ?>
                        </td>
                        <td>
                          <?php echo $row['categoria']; ?>
                        </td>
                        <td>
                          <?php echo $row['estadio']; ?>
                        </td>
                        <td>
                          <?php echo $row['equipo']; ?>
                        </td>
                        <td>
                          <?php echo $row['temporada']; ?>
                        </td>
                        <td>
                          <?php echo $row['observaciones']; ?>
                        </td>
                        <td>

                          <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-list-ul"></i>
                              Parámetros
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="../../vista/arbitro/arbitros.php?id=<?php echo $row['id_partido']; ?>">Árbitros</a>
                              <a class="dropdown-item" href="../../vista/estadisticaJugador/index.php?partido=<?php echo $row['id_partido']; ?>">Alineación</a>
                            </div>
                          </div>
                        </td>
                        <td>
                          <a href="../../vista/detalle_partido/index.php?id=<?php echo $row['id_partido']; ?>&id2=<?php echo $row['id_equipo']; ?>">
                          <button class="btn btn-success btn-round btn-sm"> <i class="far fa-eye fa-lg"></i> Ver detalles</button>
                        </td>
                        <td class="td-actions text-left">
                            <div style="float:left">
                              <a href="../../vista/partido/update.php?id=<?php echo $row['id_partido']; ?>">
                                <button type="button" rel="tooltip" title="Editar partido" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="../../vista/partido/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_partido']; ?>">
                                <!-- Inicio de modal -->
                                <button type="button" data-toggle="modal" data-target="<?php echo '#Confirmacion'.$row['id_partido']; ?>" rel="tooltip" title="Eliminar partido" class="btn btn-danger btn-link btn-sm">
                                  <i class="material-icons">close</i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="<?php echo 'Confirmacion'.$row['id_partido']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                      </div>
                                      <div class="modal-body">
                                      ¿Está seguro que desea eliminar este partido?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Eliminar</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--  -->
                              </form>
                            </div>
                        </td>
                        <?php
                      } ?>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <a href="temporada.php"> <button type="button" class="btn btn-warning pull-right"> <i class="fas fa-chart-bar"></i> Resumen de Temporadas</button></a>
              </div>
              
          </div>
        </div>
        </div>
    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
    <script type="text/javascript">
    $(document).ready(function(){
      if ($('#mensaje').val()!="") {
        alertify.success($('#mensaje').val());
      }
   $('#table1').DataTable({
       dom: 'Bfrtip',
"language": {
  "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
 },
       buttons: [
         {
           extend:'copy',
           title:'Listado de partidos',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'csv',
           title:'Listado de partidos',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'excel',
           title:'Listado de partidos',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'pdf',
           title:'Listado de partidos',
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         },
         {
           extend:'print',
           title:'<img src="../assets/img/bg.jpg" style="top:0; left:0;" /> <br> <h3>Reporte de partidos</h3>',
           messageTop:'Club social y deportivo Xelaju Mc.',
           customize: function ( win ) {
            $(win.document.body)
                .css( 'font-size', '12pt' )
                .prepend(
                    '<img src="../assets/img/bg.jpg" style="top:0; left:0;" />'
                );
            },
           exportOptions:{
             columns:[0,1,2,3,4,5,6]
           }
         }
       ],
   }) ;
});
    </script>
  </body>
</html>
