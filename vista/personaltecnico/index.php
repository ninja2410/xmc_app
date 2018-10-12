<?php
require_once('..\..\Negocio/ClassPersonalTecnico.php');
$personal=new PersonalTecnico();
$data=$personal->select($_GET['id']);
$link='..\..\vista\personaltecnico/insert.php?id='.$_GET['id'];
$btn='Asignar personal tecnico'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Personal técnico - Xelajú </title>
    <?php 
    include '..\layoults\headers2.php';    
    ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnav.php';
    ?>
    <div class="main main-raised">
      <div class="container">
      <?php
          $result = mysqli_num_rows($data);
          if($result>0)
          {
            $link='..\..\vista\personaltecnico/update.php?id='.$_GET['id'];
            $btn='Actualizar personal tecnico'
      ?>
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
                        <h4><?php echo $row['nombre'] ?></h4>
                        </td>
                    </tr>  
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
            }else
            {
            ?>
            <h2>No se asignó ningún personal</h2>
            <?php
            }
            ?>
            </div>    
            <div class="row" style="padding:20px">
                <div class="col-md-3">
                    <div>
                        <a href="<?php echo $link?>">
                        <button class="btn btn-info btn-round"><i class="fas fa-notes-medical fa-lg"></i><?php echo $btn ?></button>
                    </div>
                    <div>
                        <a href="..\..\vista\partido/index.php">
                        <button class="btn btn-default btn-round"><i class="fas fa-undo-alt fa-lg"></i> Regresar</button>
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
