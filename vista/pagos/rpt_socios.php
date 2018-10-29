<?php
require_once('..\..\Negocio/ClassPago.php');
require_once('..\..\Negocio/ClassSocio.php');
$pago=new Pago();
$data_pagos=$pago->est_Socios();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pagos - Socios</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnavLogged.php';
    ?>
    <div class="main main-raised">
    <div class="content">
      <div class="container-fluid">

          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-danger row">
              <div class="col-md-11">
                  <h3 class="card-title">Estado de pagos por socio</h3>
                  <p class="category">Información de estados de pago por socio</p>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered" id="table1">
                    <thead>
                      <th style="text-align:center;">
                        ID
                      </th>
                      <th style="text-align:center;">
                        Socio
                      </th>
                      <th style="text-align:center;">
                        Membresía
                      </th>
                      <th style="text-align:center;">
                        Pagos realizados
                      </th>
                      <th style="text-align:center;">
                        Pagos retrasados
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data_pagos)) {
                       ?>
                      <tr>
                        <td style="text-align:center">
                          <?php echo $row['ID']; ?>
                        </td>
                        <td style="text-align:center;">
                          <?php echo $row['SOCIO']; ?>
                        </td>
                        <td style="text-align:center;">
                          <?php echo $row['MEMBRESIA']; ?>
                        </td>
                        <td style="text-align:center;">
                          <?php echo $row['PAGOS']; ?>
                        </td>
                        <td style="text-align:center;">
                          <?php
                          if ($row['PENDIENTES']<=0) {
                            echo "Al día";
                          }

                          if ($row['PENDIENTES']>0) {
                            echo $row['PENDIENTES'];
                          }
                           ?>
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
    $('#table1').DataTable({
   dom: 'Bfrtip',
"language": {
  "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
 },
   buttons: [
     {
       extend:'copy',
       title:'Reporte estado de pagos por socio',
       exportOptions:{
         columns:[0,1,2,3,4]
       }
     },
     {
       extend:'csv',
       title:'Reporte estado de pagos por socio',
       exportOptions:{
         columns:[0,1,2,3,4]
       }
     },
     {
       extend:'excel',
       title:'Reporte estado de pagos por socio',
       exportOptions:{
         columns:[0,1,2,3,4]
       }
     },
     {
       extend:'pdf',
       title:'Reporte estado de pagos por socio',
       exportOptions:{
         columns:[0,1,2,3,4]
       }
     },
     {
       extend:'print',
       title:'Reporte estado de pagos por socio',
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
