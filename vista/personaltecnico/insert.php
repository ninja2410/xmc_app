<?php
  require_once('..\..\Negocio/ClassPersonalTecnico.php');
  $pt=new PersonalTecnico();
  $data=$pt->selectCargo(-1);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Personal Tecnico - Asignacion</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php include '..\layoults\barnav.php'; ?>
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">INGRESAR EL PERSONAL TECNICO</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\personaltecnico\store.php" id="frm_personaltecnico">
              <input type="hidden" name="operation" value="1">
              <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

              <div class="row">
              <?php
              while ($row=mysqli_fetch_array($data)) {
              ?>
              <div class="col-md-6">
                  <div class="form-group">
                    <label class=""> <?php echo $row['cargo']; ?></label>
                    <input type="text" class="form-control" name="<?php echo $row['id_cargo_tecnico']; ?>">
                  </div>
                </div>
              <?php
              } 
              ?>
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
                    },
                    callback: 
                    {
                        message: 'La fecha debe ser despues de la fecha actual',
                        callback: function(value, validator) {
                            var m = new moment(value, 'YYYY/MM/DD', true);
                            fi = m;
                            if (!m.isValid()) {
                                return false;
                            }
                            return m.isAfter(f);
                        }
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
