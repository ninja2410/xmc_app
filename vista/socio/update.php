<?php
require_once('..\..\Negocio/ClassSocio.php');
$socio=new Socio();
$data=$socio->select($_GET['id']);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Socios - Registro</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php include '..\layoults\barnav.php'; ?>
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">REGISTRAR SOCIO</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\socio\store.php">
              <input type="hidden" name="operation" value="2">
              <input type="hidden" name="id" value="<?php echo $data['idsocio']; ?>">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombres</label>
                    <input name="name" type="text" class="form-control" value="<?php echo $data['nombre']; ?>">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Apellidos</label>
                    <input name="apellidos" type="text" class="form-control" value="<?php echo $data['apellido']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Domicilio</label>
                    <input name="domicilio" type="text" class="form-control" value="<?php echo $data['direccion_domicilio']; ?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Teléfono</label>
                    <input name="telefono" type="phone" class="form-control" value="<?php echo $data['telefono']; ?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Fecha de Nacimiento</label>
                    <input name="fecha_nacimiento" type="text" class="form-control" value="<?php echo $data['fecha_nacimiento']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">DPI</label>
                    <input name="dpi" type="text" class="form-control" value="<?php  echo $data['DPI']; ?>">
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="form-group">
                    <label class="bmd-label-floating">Dirección de cobro</label>
                    <input name="dir_cobro" type="text" class="form-control" value="<?php echo $data['direccion_cobro']; ?>">
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
