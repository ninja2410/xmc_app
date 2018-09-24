<?php
require_once('..\..\Negocio/ClassEquipo.php');
$equipo=new Equipo();
$data=$equipo->select($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Equipo - Actualizar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '..\layoults\barnav.php'; ?>
    <div class="main main-raised" >
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title">ACTUALIZAR EQUIPO</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\equipo\store.php" id="frm_equipo">
              <input type="hidden" name="operation" value="2">
              <input type="hidden" name="id" value="<?php echo $data['id_equipo']; ?>">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $data['nombre']; ?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Procedencia</label>
                    <input type="text" class="form-control" name="procedencia" value="<?php echo $data['procedencia']; ?>">
                  </div>
                </div>
              </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="estado" value="<?php echo $data['estado']; ?>">
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
      $('#frm_equipo').bootstrapValidator({
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
                      message:'Ingrese el nombre del equipo'
                  },
                  regexp:{
                    regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]*$/,
                      message: 'Solo se aceptan letras y números'
                    }
                }
            },
              procedencia:{
                validators:{
                    notEmpty:{
                        message:'Ingrese el nombre de procedencia del equipo'
                    },
                    regexp:{
                      regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/, 
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