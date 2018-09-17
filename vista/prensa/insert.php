<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Prensa - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php include '..\layoults\barnav.php'; ?>
    <div class="content">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">INSERTAR PRENSA</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\prensa\store.php" id="frm_prensa">
              <input type="hidden" name="operation" value="1">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Apellidos</label>
                    <input type="text" class="form-control" name="apellido">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Teléfono</label>
                    <input type="text" class="form-control" name="telefono">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Empresa</label>
                    <input type="text" class="form-control" name="empresa">
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
      $('#frm_prensa').bootstrapValidator({
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
              apellido:{
                validators:{
                    notEmpty:{
                        message:'Ingrese los apellidos'
                    },
                    regexp:{
                    regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/,
                      message: 'Solo se aceptan letras'
                    }
                  }
              },
              telefono:{
                validators:{
                    notEmpty:{
                        message:'Ingrese un número de teléfono'
                    },
                    regexp:{
                      regexp: /^[0-9]*$/, 
                        message: 'Solo se aceptan números'
                      }
                  }
              },
              empresa:{
                validators:{
                    notEmpty:{
                        message:'Ingrese el nombre de la empresa'
                    },
                    regexp:{
                    regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]*$/,
                      message: 'Solo se aceptan letras y números'
                    }
                  }
              },
        }
      })
    });
    </script>
  </body>
</html>
