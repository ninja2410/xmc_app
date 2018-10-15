<?php
require_once('..\..\Negocio/ClassBeneficio.php');
$beneficio=new Beneficio();
$data=$beneficio->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Beneficios - Listar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php
    include '..\layoults\barnav.php';
    ?>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <div class="col-lg-10" style="float:left;">
                  <h2 class="card-title ">Beneficios</h4>
                  <p class="card-category"> Listado de beneficios a socios de club Xelajú MC</p>
                </div>
                <div class="col-lg-1" style="float:left">
                  <a href="..\..\vista\beneficio/insert.php">
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
                          <?php echo $row['id_beneficio']; ?>
                        </td>
                        <td>
                          <?php echo $row['nombre']; ?>
                        </td>
                        <td>
                          <?php echo $row['descripcion']; ?>
                        </td>
                        <td class="td-actions text-lefht">
                            <div style="float:left">
                              <a href="..\..\vista\beneficio/update.php?id=<?php echo $row['id_beneficio']; ?>">
                                <button type="button" rel="tooltip" title="Editar Beneficio" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="..\..\vista\beneficio/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_beneficio']; ?>">
                                <button type="submit" rel="tooltip" title="Eliminar Beneficio" class="btn btn-danger btn-link btn-sm">
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
       title:'Listado de beneficios',
       exportOptions:{
         columns:[0,1,2]
       }
     },
     {
       extend:'csv',
       title:'Listado de beneficios',
       exportOptions:{
         columns:[0,1,2]
       }
     },
     {
       extend:'excel',
       title:'Listado de beneficios',
       exportOptions:{
         columns:[0,1,2]
       }
     },
     {
       extend:'pdf',
       title:'Listado de beneficios',
       exportOptions:{
         columns:[0,1,2]
       }
     },
     {
       extend:'print',
       title:'Listado de beneficios',
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
