<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Partido - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php include '..\layoults\barnav.php'; ?>
    <div class="content">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">INGRESAR UN NUEVO PARTIDO</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\partido\store.php" id="frm_partido">
              <input type="hidden" name="operation" value="1">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Fecha</label>
                    <input type="date" class="form-control" name="partido">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Hora 1</label>
                    <input type="time" class="form-control" name="pass">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Hora 2</label>
                    <input type="time" class="form-control" name="pass">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Equipo</label>
                    <input type="date" class="form-control" name="partido">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Goles a favor</label>
                    <input type="" class="form-control" name="pass">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Goles en contra</label>
                    <input type="time" class="form-control" name="pass">
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
        $('#frm_partido').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        message: 'Valor no valido',
        fields: 
        {
            partido:
            {
                validators:
                {
                    notEmpty:
                    {
                        message:'Ingrese un nombre de partido'
                    },
                    regexp:
                    {
                      regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]*$/,
                        message: 'Solo se aceptan letras'
                    }
                }
            },
            pass:
            {
                validators:
                {
                    notEmpty:
                    {
                        message:'Ingrese un contraseña valida'
                    },
                    regexp:
                    {
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
