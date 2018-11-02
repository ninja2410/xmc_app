<?php
require_once('../../Negocio/ClassLesion.php');
$beneficio=new Lesion();
$data=$beneficio->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lesiones - Listar</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body>
    <?php
    include '../layoults/barnavLogged.php';
    ?>
    <input type="hidden" id="mensaje" name="secret" value="<?php if ($_SESSION['mensaje']!="") {
      echo $_SESSION['mensaje'];
      $_SESSION['mensaje']="";
    } ?>">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <div class="col-lg-10" style="float:left;">
                  <h2 class="card-title ">Lesiones</h4>
                  <p class="card-category"> Listado de lesiones</p>
                </div>
                <div class="col-lg-1" style="float:left">
                  <a href="../../vista/lesion/insert.php">
                    <div class="card-header card-header-success card-header-icon" style="float:left">
                      <div class="card-icon">
                        <i class="material-icons">add</i>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table1">
                    <thead class=" text-primary">
                      <th>
                        ID
                      </th>
                      <th>
                        Nombre
                      </th>
                      <th>
                        Descripción
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
                          <?php echo $row['id_lesion']; ?>
                        </td>
                        <td>
                          <?php echo $row['nombre']; ?>
                        </td>
                        <td>
                          <?php echo $row['descripcion']; ?>
                        </td>
                        <td class="td-actions text-lefht">
                            <div style="float:left">
                              <a href="../../vista/lesion/update.php?id=<?php echo $row['id_lesion']; ?>">
                                <button type="button" rel="tooltip" title="Editar Lesion" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="../../vista/lesion/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_lesion']; ?>">
                                <button type="submit" rel="tooltip" title="Eliminar Lesion" class="btn btn-danger btn-link btn-sm">
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
           title:'Listado de lesiones',
           exportOptions:{
             columns:[0,1,2]
           }
         },
         {
           extend:'csv',
           title:'Listado de lesiones',
           exportOptions:{
             columns:[0,1,2]
           }
         },
         {
           extend:'excel',
           title:'Listado de lesiones',
           exportOptions:{
             columns:[0,1,2]
           }
         },
         {
           extend:'pdf',
           title:'Listado de lesiones',
           exportOptions:{
             columns:[0,1,2]
           }
         },
         {
           extend:'print',
           title:'Listado de lesiones',
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
