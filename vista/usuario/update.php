<?php
require_once('..\..\Negocio/ClassUsuario.php');
$usuario=new Usuario();
$data=$usuario->select($_GET['id']);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Usuario - Actualizar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php
    include '..\layoults\barnav.php';
    ?>
    <div class="content">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Actualizar Usuario</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
          <form method="post", action="..\usuario\store.php" id="frm_usuario">
              <input type="hidden" name="operation" value="2">
              <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre de Usuario</label>
                    <input type="text" class="form-control" name="usuario">
                  </div>
                  <div class="form-group">
                    <label class="bmd-label-floating">Contraseña</label>
                    <input type="password" class="form-control" name="pass">
                  </div>
                  <div class="form-group">
                    <label class="bmd-label-floating">Confirmar la Contraseña</label>
                    <input type="password" class="form-control" name="pass">
                  </div>
                  <h3>Permisos</h3>
                  <br>
              <div class="col-md-6">
              <?php
                    while ($row=mysqli_fetch_array($data))
                    {
                    ?>
                  
                  <div class="checkbox col-md-6">
                    <label>
                      <input type="checkbox" name="<?php echo $row['id_permiso']; ?>"> <?php echo $row['descripcion']?>
                    </label>
                  </div>
                  
                    <?php
                    }
                    ?>
              </div>
              </div>
            </div>
              <?php include '..\layoults\botones.php'; ?>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
  </body>
</html>
