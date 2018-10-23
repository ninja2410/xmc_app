<?php
require_once('..\..\Negocio/ClassPago.php');
require_once('..\..\Negocio/ClassSocio.php');
$pago=new Pago();
$socio=new Socio();
$data_pagos=$pago->est_pago($_GET['id']);
$data_socio=$socio->select($_GET['id']);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pagos - Estado</title>
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
              <div class="col-md-11">
                  <h3 class="card-title">Pagos</h3>
                  <p class="category">Listado de pagos socio: <h2><?php echo $data_socio['nombre'].' '.$data_socio['apellido']; ?></h2> </p>
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
                        FECHA
                      </th>
                      <th>
                        MONTO
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data_pagos)) {
                       ?>
                      <tr>
                        <td>
                          <?php echo $row['id_pago']; ?>
                        </td>
                        <td>
                          <?php echo $row['fecha']; ?>
                        </td>
                        <td>Q
                          <?php echo $row['monto']; ?>
                        </td>
                        <?php
                      } ?>
                      </tr>
                    </tbody>
                  </table>
                  <a href="index.php"> <button type="button" class="btn btn-info pull-right btn-round"><i class="fas fa-undo-alt fa-lg"></i> Regresar</button></a>
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
      if ($('#mensaje').val()!="") {
        alertify.success($('#mensaje').val());
      }
    $('#table1').DataTable({
   dom: 'Bfrtip',
   buttons: [
     {
       extend:'copy',
       title:'Listado de pagos: <?php echo $data_socio['nombre'].' '.$data_socio['apellido']; ?>',
       exportOptions:{
         columns:[0,1,2]
       }
     },
     {
       extend:'csv',
       title:'Listado de pagos: <?php echo $data_socio['nombre'].' '.$data_socio['apellido']; ?>',
       exportOptions:{
         columns:[0,1,2]
       }
     },
     {
       extend:'excel',
       title:'Listado de pagos: <?php echo $data_socio['nombre'].' '.$data_socio['apellido']; ?>',
       exportOptions:{
         columns:[0,1,2]
       }
     },
     {
       extend:'pdf',
       title:'Listado de pagos: <?php echo $data_socio['nombre'].' '.$data_socio['apellido']; ?>',
       exportOptions:{
         columns:[0,1,2]
       }
     },
     {
       extend:'print',
       title:'Listado de pagos <?php echo $data_socio['nombre'].' '.$data_socio['apellido']; ?>',
       exportOptions:{
         columns:[0,1,2]
       }
     }
   ],
   "order": [[ 1, "desc" ]],
}) ;
});
    </script>
  </body>
</html>
