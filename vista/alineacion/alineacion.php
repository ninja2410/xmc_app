<?php
require_once('../../Negocio/ClassAlineacion.php');
$alineacion=new Alineacion();
$data=$alineacion->selectPartido($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alineaciones - Listar</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
  <?php include '../layoults/barnavLogged.php'; ?>
    <div class="main main-raised">
    <div class="content">
          <div class="card col-md-12">
      <div class="container-fluid">
        
            
              <div class="card-header card-header-danger row">
                <div class="col-md-11">
                  <h2 class="card-title ">Alineaciones</h4>
                  <p class="card-category">Listado de alineaciones</p>
                </div>
                <div class="col-md-1 text-right">
                <a href="../../vista/alineacion/insert_alineacion.php?id=<?php echo $_GET['id']; ?>" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar a la alineación">
                    <i class="material-icons">add</i>
                  </a>
                </div>
              </div>
              
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table1">
                    <thead>
                      <th>
                        Partido
                      </th>
                      <th>
                        Jugador
                      </th>
                      <th>
                        Posición
                      </th>
                      <th>
                       Acciones
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td>
                          <?php echo $row['fecha']; ?>
                        </td>
                        <td>
                          <?php echo $row['nombre']; ?>
                        </td>
                        <td>
                          <?php echo $row['posicion']; ?>
                        </td>
                        <td class="td-actions text-lefht">
                            <div style="float:left">
                              <a href="../../vista/alineacion/update.php?id=<?php echo $row['id_alineacion']; ?>">
                                <button type="button" rel="tooltip" title="Editar alineación" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="../../vista/alineacion/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_alineacion']; ?>">
                                <input type="hidden" name="partido" value="<?php echo $_GET['id'] ?>">
                                <button type="submit" rel="tooltip" title="Eliminar alineación" class="btn btn-danger btn-link btn-sm">
                                  <i class="material-icons">close</i>
                                </button>
                              </form>
                            </div>
                        </td>
                        <?php
                      } ?>
                      </tr>
                    </tbody>
                  </table>
                </div>
            <a href="../partido/index.php"> <button type="button" class="btn btn-info pull-right btn-round"><i class="fas fa-undo-alt fa-lg"></i> Regresar</button></a>

             

            </div>          
          
      </div>
    </div>
    </div>
    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
    <script type="text/javascript">
    $(document).ready(function(){
$('#table1').DataTable({
   dom: 'Bfrtip',
"language": {
  "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
 },
   buttons: [
     {
       extend:'copy',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de alineación',
       exportOptions:{
         columns:[0,1,2,3,4]
       }
     },
     {
       extend:'csv',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de alineación',
       exportOptions:{
         columns:[0,1,2,3,4]
       }
     },
     {
       extend:'excel',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de alineación',
       exportOptions:{
         columns:[0,1,2,3,4]
       }
     },
     {
       extend:'pdf',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de alineación',
       exportOptions:{
         columns:[0,1,2,3,4]
       }
     },
     {
       extend:'print',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de alineación',
       exportOptions:{
         columns:[0,1,2,3,4]
       }
     }
   ],
}) ;
});
    </script>
  </body>
</html>
