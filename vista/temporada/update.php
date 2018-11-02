<?php
require_once('../../Negocio/ClassTemporada.php');
$temporada=new Temporada();
$data=$temporada->select($_GET['id']);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Temporada - Actualizar</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '../layoults/barnavLogged.php';
    ?>
    <div class="main main-raised"> 
    <div class="content">
      
        <div class="card col-md-12">
          <div class="card-header card-header-danger">
            <h3 class="card-title">Actualizar temporada</h3>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="../temporada/store.php" id="frm_temporada">
              <input type="hidden" name="operation" value="2">
              <input type="hidden" name="id" value="<?php echo $data['id_temporada']; ?>">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="">Descripción</label>
                    <input type="text" class="form-control" value="<?php echo $data['descripcion']; ?>" name="descripcion">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="">Fehca de inicio</label>
                    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php echo $data['fecha_inicio']; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="">Fecha de finalización</label>
                    <input type="date" class="form-control" name="fecha_final" value="<?php echo $data['fecha_final']; ?>">
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
          descripcion:{
            validators:{
                notEmpty:{
                    message:'Ingrese el numero de la camisola del jugador'
                },
                regexp:{
                  regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s\-]*$/,
                    message: 'Solo se aceptan numeros y letras'
                    }
                }
            },
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
                        message: 'La fecha debe ser despues de la fecha de inicio',
                        callback: function(value, validator) 
                        {
                            var m = new moment(value, 'YYYY-MM-DD', true);
                            var d = document.getElementById("fecha_inicio").value;
                            var m2 = new moment(d, 'YYYY-MM-DD', true);
                            console.log(m); 

                            return m.isAfter(m2);
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
