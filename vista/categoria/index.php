<?php
require_once('../../Negocio/ClassCategoria.php');
$categoria=new Categoria();
$data=$categoria->select(-1);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Categoría - Listar</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '../layoults/barnavLogged.php'; ?>

   <div class="main main-raised">
    <div class="content">
      <div class="card">
      <div class="container-fluid">
        <input type="hidden" id="mensaje" name="secret" value="<?php if ($_SESSION['mensaje']!="") {
      echo $_SESSION['mensaje'];
      $_SESSION['mensaje']="";
    } ?>">
          <div class="col-md-13">
              <div class="card-header card-header-danger row">
              <div class="col-md-11">
                  <h3 class="card-title">Categoría</h3>
                  <p class="category">Listado de categorías</p>
                </div>
                <div class="col-md-1 text-right">
                <a href="../../vista/categoria/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar categoría">
                    <i class="material-icons">add</i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="mytable">
                    <thead>
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
                          <?php echo $row['id_categoria']; ?>
                        </td>
                        <td>
                          <?php echo $row['nombre']; ?>
                        </td>
                        <td>
                          <?php echo $row['descripcion']; ?>
                        </td>
                        <td class="td-actions text-left">
                            <div style="float:left">
                              <a href="../../vista/categoria/update.php?id=<?php echo $row['id_categoria']; ?>">
                                <button type="button" rel="tooltip" title="Editar Categoria" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="../../vista/categoria/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_categoria']; ?>">
                                <!-- Inicio de modal -->
                                <button type="button" data-toggle="modal" data-target="<?php echo '#Confirmacion'.$row['id_categoria']; ?>" rel="tooltip" title="Eliminar categoría" class="btn btn-danger btn-link btn-sm">
                                  <i class="material-icons">close</i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="<?php echo 'Confirmacion'.$row['id_categoria']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                      </div>
                                      <div class="modal-body">
                                      ¿Está seguro que desea eliminar esta categoría?
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
   </div>
    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
    <script type="text/javascript">
      $(document).ready(function(){
        if ($('#mensaje').val()!="") {
          alertify.success($('#mensaje').val());
        }
        $('#mytable').DataTable({
             dom: 'Bfrtip',
"language": {
  "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
 },
             buttons: [
               {
                 extend:'copy',
                 title:'Listado de categorías',
                 exportOptions:{
                   columns:[0,1,2]
                 }
               },
               {
                 extend:'csv',
                 title:'Listado de categorías',
                 exportOptions:{
                   columns:[0,1,2]
                 }
               },
               {
                 extend:'excel',
                 title:'Listado de categorías',
                 exportOptions:{
                   columns:[0,1,2]
                 }
               },
               {
                 extend:'pdf',
                 title:'Listado de categorías',
                 exportOptions:{
                   columns:[0,1,2]
                 }
               },
               {
                 extend:'print',
                 title:'Listado de categorías',
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
