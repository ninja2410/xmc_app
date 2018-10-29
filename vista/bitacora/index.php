<?php
require_once('..\..\Negocio/ClassBitacora.php');
$usuario=new Bitacora();
$data=$usuario->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bitácora - Listar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnav.php';
    ?>
    <div class="main main-raised">
    <div class="content">
      <div class="card col-md-12">
      <div class="container-fluid">
        
         
              <div class="card-header card-header-danger row">
                <div class="col-lg-10" style="float:left;">
                  <h2 class="card-title ">Bitácora</h2>
                  <p class="card-category">Acciones realizadas por el usuario</p>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered" id="table1">
                    <thead>
                      <th>
                        ID
                      </th>
                      <th>
                        Fecha
                      </th>
                      <th>
                        Hora
                      </th>
                      <th>
                        Usuario
                      </th>
                      <th>
                        Acción realizada
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td>
                          <?php echo $row['id_bitacora']; ?>
                        </td>
                        <td>
                          <?php echo $row['fecha']; ?>
                        </td>
                        <td>
                          <?php echo $row['hora']; ?>
                        </td>
                        <td>
                          <?php echo $row['nombre_usuario']; ?>
                        </td>
                        <td>
                          <?php echo $row['accion']; ?>
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
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
    <script type="text/javascript">
$('#table1').DataTable({
   dom: 'Bfrtip',
"language": {
  "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
 },
   buttons: [
     {
       extend:'copy',
       title:'Bitácora',
       exportOptions:{
         columns:[0,1,2,3,4]
       }
     },
     {
       extend:'csv',
       title:'Bitácora',
       exportOptions:{
         columns:[0,1,2,3,4]
       }
     },
     {
       extend:'excel',
       title:'Bitácora',
       exportOptions:{
         columns:[0,1,2,3,4]
       }
     },
     {
       extend:'pdf',
       title:'Bitácora',
       exportOptions:{
         columns:[0,1,2,3,4]
       }
     },
     {
       extend:'print',
       title:'Bitácora',
       exportOptions:{
         columns:[0,1,2,3,4]
       }
     }
   ],
}) ;
    </script>
  </body>
</html>
