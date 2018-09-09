<?php
require_once('..\..\Negocio/ClassBeneficio.php');
$beneficio=new Beneficio();
$data=$beneficio->select($_GET['id']);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Beneficios - Actualizar</title>
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
            <h4 class="card-title">Actualizar Beneficio</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\beneficio\store.php">
              <input type="hidden" name="operation" value="2">
              <input type="hidden" name="id" value="<?php echo $data['idbeneficio'] ?>">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input name="name" type="text" class="form-control" value="<?php echo $data['nombre'] ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-check">
                    <label class="form-check-label">
                      <label class="bmd-label-floating">Estado activo</label>
                      <input class="form-check-input" type="checkbox" value="<?php echo $data['estado'] ?>" checked name="status">
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                </div>

                </div>
                <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Descripcion</label>
                    <div class="form-group">
                      <label class="bmd-label-floating"> Describa en qué consiste el beneficio a agregar.</label>
                      <textarea class="form-control" rows="5" name="description" value=""><?php echo $data['descripcion'] ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Actualizar</button>
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
