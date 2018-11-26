<?php
require_once('../../Negocio/ClassSocio.php');
$socio=new Socio();
$data=$socio->select_pagos();

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Socios - Pagos</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '../layoults/barnavLogged.php';
    ?>
    <div class="main main-raised">
    <div class="content">
            <div class="card col-md-12">
      <div class="container-fluid">
       
          
              <div class="card-header card-header-danger row">
                <div class="col-lg-9" style="float:left;">
                  <h2 class="card-title ">Pagos</h4>
                  <p class="card-category">Registrar pagos de socios Xelajú MC</p>
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
                        Socio
                      </th>
                      <th>
                        Membresía
                      </th>
                      <th>
                        Precio
                      </th>
                      <th class="text-center">
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
                          <?php echo $row['SOCIO']; ?>
                        </td>
                        <td>
                          <?php echo $row['MEMBRESIA']; ?>
                        </td>
                        <td>Q
                          <?php echo $row['PRECIO']; ?>
                        </td>
                        <td class="td-actions text-center">
                          <a href="../../vista/pagos/pagar.php?id=<?php echo $row['ID']; ?>&membresia=<?php echo $row['PRECIO']; ?>">
                          <button class="btn btn-success btn-round btn-sm"><i class="fa fa-money"></i>      Realizar pago</button>
                          <a href="../../vista/pagos/pagos.php?id=<?php echo $row['ID']; ?>">
                          <button class="btn btn-info btn-round btn-sm"><i class="fa fa-eye"></i>  Ver estado de pagos</button>
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
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de socios',
           exportOptions:{
             columns:[0,1,2,3]
           }
         },
         {
           extend:'csv',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de socios',
           exportOptions:{
             columns:[0,1,2,3]
           }
         },
         {
           extend:'excel',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de socios',
           exportOptions:{
             columns:[0,1,2,3]
           }
         },
         {
           extend:'pdf',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de socios',
           exportOptions:{
             columns:[0,1,2,3]
           }
         },
         {
           extend:'print',
           title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de socios',
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
