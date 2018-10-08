<?php
require_once('..\..\Negocio/ClassPersonalTecnico.php');
$personal=new PersonalTecnico();
$data=$personal->select($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Personal Tecnico - Xelaju </title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnav.php';
    ?>
    
    <div class="main main-raised">
    <form method="post", action="..\personaltecnico\store.php" id="frm_personaltecnico">
      <input type="hidden" name="operation" value="2">
      <div class="container">
       <div class="table-responsive">
            <table id="tablapartido" class="table table-sm text-center" >
                <thead class=" text-primary">
                      <th>
                        <h2 class="title">Cargo</h2>
                      </th>
                      <th>
                        <h3 class="title"></h3>
                      </th>
                </thead>
                <tbody>
                <?php
                    while ($row=mysqli_fetch_array($data))
                    {
                ?>
                    <tr>
                        <td>
                        <h4><b><?php echo $row['cargo']?></b></h4>
                        </td>
                        <td>
                        <h4><input type="text" class="form-control" name="<?php echo $row['id_personal_tecnico']; ?>" value="<?php echo $row['nombre']; ?>" ></h4>
                        </td>
                    </tr>  
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>    
        <?php include '..\layoults\botones.php'; ?>
        <div class="clearfix"></div>
        </form>
        </div>
        <br>
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
           title:'Listado de personal tecnico',
           exportOptions:{
             columns:[0,1,2,3]
           }
         },
         {
           extend:'csv',
           title:'Listado de personal tecnico',
           exportOptions:{
             columns:[0,1,2,3]
           }
         },
         {
           extend:'excel',
           title:'Listado de personal tecnico',
           exportOptions:{
             columns:[0,1,2,3]
           }
         },
         {
           extend:'pdf',
           title:'Listado de personal tecnico',
           exportOptions:{
             columns:[0,1,2,3]
           }
         },
         {
           extend:'print',
           title:'Listado de personal tecnico',
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
