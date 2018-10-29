<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Temporada - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '..\layoults\barnavLogged.php'; ?>
    <div class="main main-raised"> 
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title">Ingresar una nueva temporada</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\temporada\store.php" id="frm_temporada">
              <input type="hidden" name="operation" value="1">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="">Descripción</label>
                    <input type="text" class="form-control" name="descripcion">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="">Fecha de inicio de la temporada</label>
                    <input type="text" placeholder="YYYY/MM/DD" class="form-control" name="fecha_inicio">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="">Fecha de finalización</label>
                    <input type="text" placeholder="YYYY/MM/DD" class="form-control" name="fecha_final">
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
    var f = new Date();
    var fi = new moment();
      $(document).ready(function(){
        $('#frm_temporada').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        message: 'Valor no valido',
        fields: 
        {
          fecha_inicio: 
          {
                validators: 
                {
                    notEmpty: 
                    {
                      message: 'La fecha del partido es necesario'
                    },
                    date: 
                    {
                        message: 'El formato de la fecha no es valida',
                        format: 'YYYY/MM/DD'
                    }
                }
          },
          fecha_final: 
          {
                validators: 
                {
                    notEmpty: 
                    {
                      message: 'La fecha del partido es necesario'
                    },
                    date: 
                    {
                        message: 'El formato de la fecha no es valida',
                        format: 'YYYY/MM/DD'
                    },
                    callback: 
                    {
                        message: 'La fecha debe ser despues de la fecha actual',
                        callback: function(value, validator) 
                        {
                            var m = new moment(value, 'YYYY/MM/DD', true);
                            if (!m.isValid())
                            {
                                return false;
                            }else if (m<fi)
                            {
                              return false;
                            }
                            return m.isAfter(f);
                        }
                    }
                }
          }
            
        }
    })
      });
    </script>
  </body>
</html>
