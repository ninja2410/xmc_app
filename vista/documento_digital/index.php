<?php
require_once('..\..\Negocio/ClassDocumento.php');
$documento=new Documento();
$data=$documento->select(-1);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Documentos - Listar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnav.php';
    ?>
    <div class="main main-raised">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <div class="col-lg-10" style="float:left;">
                    <h4 class="card-title ">Documentos digitales</h4>
                    <p class="card-category"> Listado de documentos almacenados en el sistema</p>
                  </div>
                  <div class="col-lg-1" style="float:left">
                    <a href="..\..\vista\documento_digital/insert.php">
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
                    <table class="table" id="mytable">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Fecha
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
                            <?php echo $row['descripcion']; ?>
                          </td>
                          <td>
                            <?php echo $row['CATEGORIA']; ?>
                          </td>
                          <td class="td-actions text-lefht">
                              <div style="float:left">
                                <a href="..\..\vista\documento_digital/ver.php?id=<?php echo $row['ID']; ?>">
                                  <button type="button" rel="tooltip" title="Ver Documento" class="btn btn-success btn-link btn-sm">
                                    <i class="material-icons">pageview</i>
                                  </button>
                                </a>
                              </div>
                              <div style="float:left">
                                <a href="..\..\vista\documento_digital/update.php?id=<?php echo $row['ID']; ?>">
                                  <button type="button" rel="tooltip" title="Editar Documento" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button>
                                </a>
                              </div>
                              <div  style="float:left">
                                <form class="" action="..\..\vista\documento_digital/store.php" method="post">
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
      </div>
    </div>

    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
    <script>

       $(document).ready(function(){
         $('#mytable').DataTable({
             dom: 'Bfrtip',
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
