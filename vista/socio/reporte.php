<?php
require_once('../../Negocio/ClassSocio.php');
$socio=new Socio();
$data=$socio->reporte();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Socios - Listar</title>
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
                  <h3 class="card-title ">Socios</h3>
                  <p class="card-category">Listado de socios del club Xelajú MC</p>
                </div>
                <div class="col-md-1 text-right">

                </div>
              </div>
              <div class="card-body text-center">
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
                        Domicilio
                      </th>
                      <th>
                        Teléfono
                      </th>
                      <th>
                        Fecha Nacimiento
                      </th>
                      <th>
                        Fecha Registro
                      </th>
                      <th>
                        DPI
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Membresía
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td>
                          <?php echo $row['id_socio']; ?>
                        </td>
                        <td>
                        <?php echo $row['nombre']; ?>
                        </td>
                        <td>
                          <?php echo $row['DOMISCILIO']; ?>
                        </td>
                        <td>
                          <?php echo $row['telefono']; ?>
                        </td>
                        <td>
                          <?php echo date('d/m/Y',strtotime($row['fecha_nacimiento'])); ?>
                        </td>
                        <td>
                          <?php echo date('d/m/Y',strtotime($row['fecha_registro'])); ?>
                        </td>
                        <td>
                          <?php echo $row['DPI']; ?>
                        </td>
                        <td>
                          <?php echo $row['email']; ?>
                        </td>
                        <td>
                          <?php echo $row['membresia']; ?>
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
      if ($('#mensaje').val()!="") {
        alertify.success($('#mensaje').val());
      }
   $('#table1').DataTable({
       dom: 'Bfrtip',
"language": {
  "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
 },
       buttons: [
         {
           extend:'copy',
           title:'Listado de socios',
           exportOptions:{
             columns:[0,1,2,3,4,5,6,7,8]
           }
         },
         {
           extend:'csv',
           title:'Listado de socios',
           exportOptions:{
             columns:[0,1,2,3,4,5,6,7,8]
           }
         },
         {
           extend:'excel',
           title:'Listado de socios',
           exportOptions:{
             columns:[0,1,2,3,4,5,6,7,8]
           }
         },
         {
           extend:'pdf',
           title:'Listado de socios',
           exportOptions:{
             columns:[0,1,2,3,4,5,6,7,8]
           }
         },
         {
           extend:'print',
           title:'Listado de socios',
           exportOptions:{
             columns:[0,1,2,3,4,5,6,7,8]
           }
         }
       ],
   }) ;
});
    </script>
  </body>
</html>
