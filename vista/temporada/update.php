<?php
require_once('..\..\Negocio/ClassTemporada.php');
$temporada=new Temporada();
$data=$temporada->select($_GET['id']);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Temporada - Actualizar</title>
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
            <h4 class="card-title">Actualizar temporada</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\temporada\store.php">
              <input type="hidden" name="operation" value="2">
              <input type="hidden" name="id" value="<?php echo $data['id_temporada']; ?>">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="">Descripcion</label>
                    <input type="text" class="form-control" value="<?php echo $data['descripcion']; ?>" name="descripcion">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Fehca de inicio</label>
                    <input type="date" class="form-control" name="fecha_inicio" value="<?php echo $data['fecha_inicio']; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Fecha de finalizacion</label>
                    <input type="date" class="form-control" name="fecha_final" value="<?php echo $data['fecha_final']; ?>">
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
