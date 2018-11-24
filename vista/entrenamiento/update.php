<?php
require_once('../../Negocio/ClassTemporada.php');
require_once('../../Negocio/ClassEntrenamiento.php');
$temporada=new Temporada();
$entreno=new Entrenamiento();
$data=$temporada->select(-1);
$dataE=$entreno->select($_GET['id']);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Entrenamiento - Insertar</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '../layoults/barnavLogged.php'; ?>
    <div class="main main-raised">
    <div class="content">
      
        <div class="card col-md-12">
          <div class="card-header card-header-danger">
            <h3 class="card-title">Agregar entreno</h3>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="../entrenamiento/store.php">
              <input type="hidden" name="operation" value="2">
              <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label >Fecha</label>
                    <input type="text" class="form-control" value="<?php echo $dataE['fecha'] ?>"  name="fecha">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Temporada</label>
                    <select class="form-control" name="temporada">
                      <?php while ($row=mysqli_fetch_array($data)) { ?>
                      <option value="<?php echo $row['id_temporada'] ?>"><?php echo $row['descripcion']?></option>
                    <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <?php include '../layoults/botones.php'; ?>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      
    </div>
    </div>
    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
  </body>
</html>
