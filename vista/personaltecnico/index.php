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
        <div class="container">
            <div class="row" style="padding:20px">
                <div class="col-md-7">
                    <h3 class="title">Xelaju</h3>
                    <?php
                    while ($row=mysqli_fetch_array($data))
                    {
                    ?>
                    <h4><b><?php echo $row['cargo']?>: </b> <?php echo $row['nombre']?></h4>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-md-3">
                    <div>
                        <a href="..\..\vista\personaltecnico/update.php?id=<?php echo $_GET['id']?>">
                        <button class="btn btn-info btn-round"><i class="fas fa-notes-medical fa-lg"></i>Modificar resultados</button>
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
  </body>
</html>
