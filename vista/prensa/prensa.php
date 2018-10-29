<?php
require_once('..\..\Negocio/ClassPrensa.php');
$prensa = new Prensa();
$data=$prensa->selectPrensa($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Prensa - Listar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
  <?php include '..\layoults\barnav.php'; ?>
    <div class="main main-raised">
    <div class="content">
      <div class="container-fluid">
        
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-danger row">
                <div class="col-md-11">
                  <h2 class="card-title ">PRENSA</h4>
                  <p class="card-category">Listado de prensas</p>
                </div>
                <div class="col-md-1 text-right">
                <a href="..\..\vista\prensa/partido_prensa.php?id=<?php echo $_GET['id']; ?>" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar a la alineación">
                    <i class="material-icons">add</i>
                  </a>
                </div>
              </div>
              
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table1">
                    <thead>
                      <th>
                        prensa
                      </th>
                      <th>
                        Tipo
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
                          <?php echo $row['nombre']; ?>
                        </td>
                        <td>
                          <?php echo $row['tipo']; ?>
                        </td>
                        <td class="td-actions text-lefht">
                            <div style="float:left">
                              <a href="..\..\vista\prensa/update.php?id=<?php echo $row['id_prensa']; ?>">
                                <button type="button" rel="tooltip" title="Editar prensa" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="..\..\vista\prensa/store.php" method="post">
                                <input type="hidden" name="operation" value="4">
                                <input type="hidden" name="id" value="<?php echo $row['id_asignacion_prensa' ]; ?>">
                                <input type="hidden" name="partido" value="<?php echo $_GET['id'] ?>">
                                <button type="submit" rel="tooltip" title="Eliminar prensa del partido" class="btn btn-danger btn-link btn-sm">
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
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
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
       title:'Listado de alineación',
       exportOptions:{
         columns:[0,1,2,3,4]
       }
     },
     {
       extend:'csv',
       title:'Listado de alineación',
       exportOptions:{
         columns:[0,1,2,3,4]
       }
     },
     {
       extend:'excel',
       title:'Listado de alineación',
       exportOptions:{
         columns:[0,1,2,3,4]
       }
     },
     {
       extend:'pdf',
       title:'Listado de alineación',
       exportOptions:{
         columns:[0,1,2,3,4]
       }
     },
     {
       extend:'print',
       title:'Listado de alineación',
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
