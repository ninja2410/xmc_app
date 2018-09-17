<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Entrenador - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php include '..\layoults\barnav.php'; ?>
    <div class="content">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">INSERTAR ENTRENADOR</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\entrenador\store.php">
             <input type="hidden" name="operation" value="1"> 
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Apellido</label>
                    <input type="text" class="form-control" name="apellido">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Fecha de Nacimiento</label>
                    <input type="text" class="form-control" name="f_nacimiento">
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Fecha inicio de labores</label>
                    <input type="text" class="form-control" name="f_inicio">
                  </div>
                </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="bmd-label-floating">Fecha final de labores</label>
                    <input type="text" class="form-control" name="f_inicio">
                 </div>
            </div>  
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="bmd-label-floating">Direccion</label>
                    <input type="text" class="form-control" name="direccion">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Teléfono</label>
                    <input type="text" class="form-control" name="telefono">
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