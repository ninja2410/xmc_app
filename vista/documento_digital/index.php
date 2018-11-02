<?php
require_once('../../Negocio/ClassDocumento.php');
$documento=new Documento();
$data=$documento->select(-1);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Documentos - Listar</title>
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
                    <h3 class="card-title ">Documentos digitales</h3>
                    <p class="card-category"> Listado de documentos almacenados en el sistema</p>
                  </div>
                  <div class="col-md-1 text-right">
                <a href="../../vista/documento_digital/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar documento">
                    <i class="material-icons">add</i>
                  </a>
                </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover" id="mytable">
                      <thead>
                        <th>
                          ID
                        </th>
                        <th>
                          Fecha
                        </th>
                        <th>
                          Título
                        </th>
                        <th>
                          Descripción
                        </th>
                        <th>
                          Categoría
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
                            <?php echo $row['ID']; ?>
                          </td>
                          <td>
                            <?php echo $row['FECHA']; ?>
                          </td>
                          <td>
                            <?php echo $row['titulo']; ?>
                          </td>
                          <td>
                            <?php echo $row['descripcion']; ?>
                          </td>
                          <td>
                            <?php echo $row['CATEGORIA']; ?>
                          </td>
                          <td class="td-actions text-lefht">
                              <div style="float:left">
                                <a href="../../vista/documento_digital/ver.php?id=<?php echo $row['ID']; ?>">
                                  <button type="button" rel="tooltip" title="Ver documento" class="btn btn-success btn-link btn-sm">
                                  <i class="fa fa-eye"></i>
                                  </button>
                                </a>
                              </div>
                              <div style="float:left">
                                <a href="../../vista/documento_digital/update.php?id=<?php echo $row['ID']; ?>">
                                  <button type="button" rel="tooltip" title="Editar Documento" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button>
                                </a>
                              </div>
                              <div  style="float:left">
                                <form class="" action="../../vista/documento_digital/store.php" method="post">
                                  <input type="hidden" name="operation" value="3">
                                  <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
                                  <button type="submit" rel="tooltip" title="Eliminar Documento" class="btn btn-danger btn-link btn-sm">
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

    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
    <script>

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
                 title:'Listado de documentos',
                 exportOptions:{
                   columns:[0,1,2,3]
                 }
               },
               {
                 extend:'csv',
                 title:'Listado de documentos',
                 exportOptions:{
                   columns:[0,1,2,3]
                 }
               },
               {
                 extend:'excel',
                 title:'Listado de documentos',
                 exportOptions:{
                   columns:[0,1,2,3]
                 }
               },
               {
                 extend:'pdf',
                 title:'Listado de documentos',
                 exportOptions:{
                   columns:[0,1,2,3]
                 }
               },
               {
                 extend:'print',
                 title:'Listado de documentos',
                 exportOptions:{
                   columns:[0,1,2,3]
                 }
               }
             ],
         }) ;
        });

    </script>
  </body>
</html>
