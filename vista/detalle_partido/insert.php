<?php
require_once('..\..\Negocio/ClassDetallePartido.php');
$partido=new Detalle();
$data=$partido->selectXela($_GET['id']);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Resultados - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '..\layoults\barnav.php'; ?>
    <div class="main main-raised"> 
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title">INGRESAR RESULTADOS</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\detalle_partido\store.php" id="frm_detalle_partido">
              <input type="hidden" name="operation" value="2">
              <input type="hidden" name="id" value="<?php echo $data['id_detalle_partido']; ?>">
              <input type="hidden" name="equi" value="1">
              <input type="hidden" name="partido" value="<?php echo $data['id_partido']; ?>">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Faltas</label>
                    <input type="text" class="form-control" name="fal" value="<?php echo $data['faltas']; ?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Esquinas</label>
                    <input type="text" class="form-control" name="esq" value="<?php echo $data['esquinas']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Asistencias</label>
                    <input type="text" class="form-control" name="asis">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tiros</label>
                    <input type="text" class="form-control" name="tiros">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tiros a puerta</label>
                    <input type="text" class="form-control" name="tiros_puerta">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tarjetas amarillas</label>
                    <input type="text" class="form-control" name="ta">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tarjetas rojas</label>
                    <input type="text" class="form-control" name="tr">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Fuera de juego</label>
                    <input type="text" class="form-control" name="fj">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Cambios</label>
                    <input type="text" class="form-control" name="cam">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Goles</label>
                    <input type="text" class="form-control" name="gol">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Expulsados</label>
                    <input type="text" class="form-control" name="exp">
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
      $('#frm_detalle_partido').bootstrapValidator({
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
