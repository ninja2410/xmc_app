<?php
require_once('../../Negocio/ClassArbitro.php');
$arbitro=new Arbitro();
$data=$arbitro->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Árbitro - Listar</title>
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
                  <h3 class="card-title">Árbitros</h3>
                  <p class="category">Listado de árbitros</p>
                </div>
                <div class="col-md-1 text-right">
                <a href="../../vista/arbitro/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar árbitro">
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
                        Nombre
                      </th>
                      <th>
                        Tipo de árbitro
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
                          <?php echo $row['id_arbitro']; ?>
                        </td>
                        <td>
                          <?php echo $row['nombre']; ?>
                        </td>
                        <td>
                          <?php echo $row['tipo']; ?>
                        </td>
                        <td class="td-actions text-lefht">
                            <div style="float:left">
                              <a href="../../vista/arbitro/update.php?id=<?php echo $row['id_arbitro']; ?>">
                                <button type="button" rel="tooltip" title="Editar árbitro" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="../../vista/arbitro/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_arbitro']; ?>">
                                <!-- Inicio de modal -->
                                <button type="button" data-toggle="modal" data-target="<?php echo '#Confirmacion'.$row['id_arbitro']; ?>" rel="tooltip" title="Eliminar árbitro" class="btn btn-danger btn-link btn-sm">
                                  <i class="material-icons">close</i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="<?php echo 'Confirmacion'.$row['id_arbitro']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                      </div>
                                      <div class="modal-body">
                                      ¿Está seguro que desea eliminar este árbitro?
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
              </div>
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
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de arbitros',
       exportOptions:{
         columns:[0,1,2]
       }
     },
     {
       extend:'csv',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de arbitros',
       exportOptions:{
         columns:[0,1,2]
       }
     },
     {
       extend:'excel',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de arbitros',
       exportOptions:{
         columns:[0,1,2]
       }
     },
     {
       extend:'pdf',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de arbitros',
       exportOptions:{
         columns:[0,1,2]
       }
     },
     {
       extend:'print',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de arbitros',
       exportOptions:{
         columns:[0,1,2]
       }
     }
   ],
}) ;
});
    </script>
  </body>
</html>
