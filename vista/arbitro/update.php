<?php
require_once('..\..\Negocio/ClassArbitro.php');
$arbitro=new Arbitro();
$data=$arbitro->select($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Árbitro - Actualizar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '..\layoults\barnav.php'; ?>
    <div class="main main-raised" >
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h3 class="card-title">Actualizar árbitro</h3>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\arbitro\store.php" id="frm_arbitro">
              <input type="hidden" name="operation" value="2">
              <input type="hidden" name="id" value="<?php echo $data['id_arbitro']; ?>">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $data['nombre']; ?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Tipo de árbitro</label>
                    <select class="form-control" name="tipo">
                      <option selected>Elija el tipo de árbitro</option>
                      <option value="Árbitro">Árbitro</option>
                      <option value="A. Asistente No.1">A. Asistente No.1</option>
                      <option value="A. Asistente No.2">A. Asistente No.2</option>
                      <option value="Cuarto oficial">Cuarto oficial</option>
                    </select>
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
    </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#frm_arbitro').bootstrapValidator({
      feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      message: 'Valor no valido',
      fields: {
          nombre:{
              validators:{
                  notEmpty:{
                      message:'Ingrese un nombre'
                  },
                  regexp:{
                    regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/,
                      message: 'Solo se aceptan letras'
                    }
                }
            },
            tipo:{
              validators:{
                  notEmpty:{
                      message:'Ingrese un tipo'
                  },
        }
      })
    });
    </script>
  </body>
</html>
