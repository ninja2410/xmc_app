<?php
require_once('../../Negocio/ClassPersonalTecnico.php');
$personal=new PersonalTecnico();
$data=$personal->select(-1);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Personal técnico</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
  <?php include '../layoults/barnavLogged.php'; ?>
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
                  <h3 class="card-title ">Personal técnico</h3>
                  <p class="card-category">Listado del personal</p>
                </div>
              </div>
              <div class="card-body col-md-12">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table1">
                    <thead>
                      <th>
                        Partido
                      </th>
                      <th>
                        Cargo
                      </th>
                      <th>
                        Nombre
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td>
                        <?php echo $row['fecha']; ?>
                        </td>
                        <td>
                          <?php echo $row['cargo']; ?>
                        </td>
                        <td>
                          <?php echo $row['nombre']; ?>
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
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de alineación',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'csv',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de alineación',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'excel',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de alineación',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'pdf',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de alineación',
       exportOptions:{
         columns:[0,1,2,3,4,5,6,7,8]
       }
     },
     {
       extend:'print',
       title:'<img src="../../vista/imagenes/encaezado.jpg" style="width:100%;">Listado de alineación',
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
