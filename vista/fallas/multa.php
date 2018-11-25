<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Multa - Insertar</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '../layoults/barnavLogged.php'; ?>
    <div class="main main-raised">
    <div class="content">
      
        <div class="card col-md-12">
          <div class="card-header card-header-danger">
            <h3 class="card-title">Insertar multa</h3>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="../fallas/store.php"  id="frm_falla">
              <input type="hidden" name="operation" value="1">
              <input type="hidden" name="jugador" value="<?php echo $_GET['id'] ?>">
                <div class="row">
                  <div class="form-group col-md-4">
                      <label>Fecha de la multa</label>
                      <input type="date" class="form-control" readonly name="fecha_multa" value="<?php echo date("Y-m-d");?>">
                  </div>
                  <div class="form-group col-md-4">
                      <label >Descripción</label>
                      <input type="text" class="form-control" name="descripcion" placeholder="El porque se le impondra una multa la jugador.">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                      <label >Sanción económica</label>
                      <input type="text" class="form-control" name="sancionE" id="economica" placeholder="Escribir la sancion economica en Quetzales">
                  </div>
                  <div class="form-group col-md-4">
                      <label >Sanción física</label>
                      <input type="text" class="form-control" name="sancionF" id="fisica" placeholder="Escribir la sancion fisica que se le pondra al jugador.">
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
    $(document).ready(function(){
      $('#frm_falla').bootstrapValidator({
      feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      message: 'Valor no valido',
      fields: {
            descripcion:{
              validators:{
                  notEmpty:{
                      message:'Ingrese un nombre'
                  },
                  regexp:{
                    regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s\.\:]*$/,
                      message: 'Solo se aceptan letras y números'
                    }
                }
            },
            sancionE:{
              validators:{
                  notEmpty:{
                      message:'Ingrese el valor de la multa en Quetzales'
                  },
                  regexp:{
                    regexp: /^[0-9\.]*$/,
                      message: 'Solo se aceptan números'
                    }
                }
            },
            sancionF:{
                validators:{
                    notEmpty:{
                        message:'Ingrese la multa impuesta al jugador'
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
    <script type="text/javascript">
        $(document).ready(function() {
            $("#economica").on("keyup", function() {
                if ($("#economica").val() == "") {
                    $("#fisica").prop("disabled", false);
                } else {
                    $("#fisica").prop("disabled", true );
                }
            });
            $("#fisica").on("keyup", function() {
                if ($("#fisica").val() == "") {
                    $("#economica").prop("disabled", false);
                } else {
                    $("#economica").prop("disabled", true );
                }
            });
        });
    </script> 
  </body>
</html>
