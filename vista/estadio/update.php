<?php
require_once('../../Negocio/ClassEstadio.php');
$estadio=new Estadio();
$data=$estadio->select($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Estadio - Actualizar</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '../layoults/barnavLogged.php'; ?>
    <div class="main main-raised" >
    <div class="content">
      
        <div class="card col-md-12">
          <div class="card-header card-header-danger">
            <h3 class="card-title">Actualizar estadio</h3>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="../estadio/store.php" id="frm_estadio">
              <input type="hidden" name="operation" value="2">
              <input type="hidden" name="id" value="<?php echo $data['id_estadio']; ?>">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $data['nombre']; ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">Ciudad</label>
                    <input type="text" class="form-control" name="ciudad" value="<?php echo $data['ciudad']; ?>">
                  </div>
                </div>
              </div>

              
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Dirección</label>
                    <input type="text" class="form-control" name="direccion" value="<?php echo $data['direccion']; ?>">
                  </div>
                </div>
                
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" value="<?php echo $data['telefono']; ?>">
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
    $(document).ready(function(){
      $('#frm_estadio').bootstrapValidator({
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
                    regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]*$/,
                      message: 'Solo se aceptan letras y números'
                    }
                }
            },
              ciudad:{
                validators:{
                    notEmpty:{
                        message:'Ingrese el nombre de la ciudad'
                    },
                    regexp:{
                      regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]*$/, 
                        message: 'Solo se aceptan letras y números'
                      }
                  }
              },
            direccion:{
                validators:{
                    notEmpty:{
                        message:'Ingrese una dirección'
                    },
                    regexp:{
                      regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ-_.\s]*$/, 
                        message: 'Solo se aceptan letras, números, espacios, guión y guión bajo'
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
        }
      })
    });
    </script>
  </body>
</html>
