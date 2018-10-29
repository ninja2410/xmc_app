<?php
require_once('..\..\Negocio/ClassDocumento.php');
$documento=new Documento();
$data=$documento->select_socio($_GET['id']);
require_once('..\..\Negocio/ClassSocio.php');
$soc=new Socio();
$socio=$soc->select($_GET['id']);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Documentos - <?php echo $socio['nombre'].' '.$socio['apellido']; ?></title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnav.php';
    ?>
    <input type="hidden" id="mensaje" name="secret" value="<?php if ($_SESSION['mensaje']!="") {
      echo $_SESSION['mensaje'];
      $_SESSION['mensaje']="";
    } ?>">
    <div class="main main-raised">
      <div class="content">
        <div class="container-fluid">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-danger row">
                  <div class="col-md-10">
                    <h4 class="card-title ">Documentos digitales</h4>
                    <p class="card-category"> Listado de documentos almacenados en el sistema asignados al socio: <?php echo $socio['nombre'].' '.$socio['apellido']; ?></p>
                  </div>
                  <div class="col-md-2 text-right">
                    <a href="..\..\vista\socio/create.php?id=<?php echo $_GET['id']; ?>" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar documento">
                    <i class="material-icons">add</i>
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
                                <a href="..\..\vista\socio/ver_doc_soc.php?id=<?php echo $row['ID']; ?>">
                                  <button type="button" rel="tooltip" title="Ver Documento" class="btn btn-success btn-link btn-sm">
                                    <i class="material-icons">pageview</i>
                                  </button>
                                </a>
                              </div>
                              <div style="float:left">
                                <a href="..\..\vista\socio/update_doc_soc.php?id=<?php echo $row['ID']; ?>">
                                  <button type="button" rel="tooltip" title="Editar Documento" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button>
                                </a>
                              </div>
                              <div  style="float:left">
                                <form class="" action="..\..\vista\socio/store_document.php" method="post">
                                  <input type="hidden" name="operation" value="3">
                                  <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
                                  <input type="hidden" name="id_socio" value="<?php echo $row['id_socio']; ?>">
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