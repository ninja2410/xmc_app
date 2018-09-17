<?php
require_once('..\..\Negocio/ClassParteCuerpo.php');
$parte=new ParteCuerpo();
$data=$parte->select($_GET['id']);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Partes del Cuerpo - Actualizar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php include '..\layoults\barnav.php'; ?>
    <div class="content">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Actualizar Parte del Cuerpo</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\parteCuerpo\store.php" >
              <input type="hidden" name="operation" value="2">
              <input type="hidden" name="id" value="<?php echo $data['idParte'] ?>">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input name="nombre" type="text" class="form-control" value="<?php echo $data['Nombre'] ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-check">
                    <label class="form-check-label">
                      <label class="bmd-label-floating">Estado activo</label>
                      <input class="form-check-input" type="checkbox" name="status" <?php
                       if ($data['Estado']==1){
                         echo "checked";
                       }
                      ?>>
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
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

    <script type="text/javascript">
      $(document).ready(function(){
        $('#frm_ParteCuerpo').bootstrapValidator({
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
                        message:'Ingrese el nombre de la parte del cuerpo'
                    },
                    regexp:{
                      regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]*$/,
                        message: 'Solo se aceptan letras'
                    }
                }
            },
        }
    })
      });
    </script>

  </body>
</html>
