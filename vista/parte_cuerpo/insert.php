<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Partes del cuerpo - Insertar</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body>
    <?php include '../layoults/barnavLogged.php'; ?>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-danger">
                  <h4 class="card-title">Ingresar parte del cuerpo</h4>
                  <p class="category">Complete los campos siguientes</p>
              </div>
              <div class="card-body">
                <form method="post", action="../parte_cuerpo/store.php" id="frm_parteCuerpo">
                <input type="hidden" name="operation" value="1">
                    <div class="form-row"> 
                        <div class="form-group col-md-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre">
                        </div>

                        <div class="form-group col-md-4">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" checked name="status">
                                        Estado activo
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
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
      </div>
    </div>
    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#frm_parteCuerpo').bootstrapValidator({
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
                      regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s\/]*$/,
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
