<?php
require_once('../../Negocio/ClassContrato.php');
$contrato=new Contrato();
$data=$contrato->select(-1);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contrato - Listar</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '../layoults/barnav.php';
    ?>
    <div class="main main-raised">
    <div class="content">
      <div class="container-fluid">

          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-danger row">
              <div class="col-md-11">
                  <h3 class="card-title">Contrato</h3>
                  <p class="category">Listado de contratos</p>
                </div>
                <div class="col-md-1 text-right">
                <a href="../../vista/contrato/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar contrato">
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
                        Título del contrato
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td>
                          <?php echo $row['id_contrato']; ?>
                        </td>
                        <td>
                          <?php echo $row['titulo']; ?>
                        </td>
                        <td>
                          </td>
                          <td class="td-actions text-left">
                              <div style="float:left">
                                <a href="../../vista/contrato/detalle.php?id=<?php echo $row['id_contrato']; ?>">
                                <button class="btn btn-success btn-round btn-sm"><i class="far fa-eye fa-lg"></i> Ver detalles</button>
                              </div>
                            <div style="float:left">
                              <a href="../../vista/contrato/update.php?id=<?php echo $row['id_contrato']; ?>">
                                <button type="button" rel="tooltip" title="Editar contrato" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="../../vista/contrato/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_contrato']; ?>">
                                <button type="submit" rel="tooltip" title="Eliminar contrato" class="btn btn-danger btn-link btn-sm">
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
$('#table1').DataTable({
   dom: 'Bfrtip',
"language": {
  "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
 },
   buttons: [
     {
       extend:'copy',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de contratos',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'csv',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de contratos',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'excel',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de contratos',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'pdf',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de contratos',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'print',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de contratos',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     }
   ],
}) ;
});
    </script>
  </body>
</html>
