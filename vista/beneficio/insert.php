<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Beneficios - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php include '..\layoults\barnav.php'; ?>
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">INSERTAR BENEFICIOS</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\beneficio\store.php">
              <input type="hidden" name="operation" value="1">
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input name="name" type="text" class="form-control" >
                  </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Descripcion</label>
                    <div class="form-group">
                      <label class="bmd-label-floating"> Describa en qué consiste el beneficio a agregar.</label>
                      <textarea class="form-control" rows="5" name="description"></textarea>
                    </div>
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
