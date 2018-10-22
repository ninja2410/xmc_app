<?php
require_once('..\..\Negocio/ClassArbitro.php');
$arbitro=new Arbitro();
$data=$arbitro->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Árbitro - Listar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnav.php';
    ?>
    <div class="main main-raised">
    <div class="content">
      <div class="container-fluid">

          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-danger row">
              <div class="col-md-11">
                  <h3 class="card-title">Árbitros</h3>
                  <p class="category">Listado de árbitros</p>
                </div>
                <div class="col-md-1 text-right">
                <a href="..\..\vista\arbitro/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar árbitro">
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
                        Tipo
                      </th>
                      <!-- <th>
                        Tipo árbitro
                      </th> -->
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
                              <a href="..\..\vista\arbitro/update.php?id=<?php echo $row['id_arbitro']; ?>">
                                <button type="button" rel="tooltip" title="Editar árbitro" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>

                            <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<button class="btn btn-primary" type="button" rel="tooltip" title="Editar árbitro" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#exampleModal">
<i class="material-icons">edit</i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


                            <div  style="float:left">
                              <form class="" action="..\..\vista\arbitro/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_arbitro']; ?>">
                                <button type="submit" rel="tooltip" title="Eliminar árbitro" class="btn btn-danger btn-link btn-sm">
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
   buttons: [
     {
       extend:'copy',
       title:'Listado de arbitros',
       exportOptions:{
         columns:[0,1]
       }
     },
     {
       extend:'csv',
       title:'Listado de arbitros',
       exportOptions:{
         columns:[0,1]
       }
     },
     {
       extend:'excel',
       title:'Listado de arbitros',
       exportOptions:{
         columns:[0,1]
       }
     },
     {
       extend:'pdf',
       title:'Listado de arbitros',
       exportOptions:{
         columns:[0,1]
       }
     },
     {
       extend:'print',
       title:'Listado de arbitros',
       exportOptions:{
         columns:[0,1]
       }
     }
   ],
}) ;
});
    </script>
  </body>
</html>
