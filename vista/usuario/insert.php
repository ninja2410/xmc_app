<?php
require_once('..\..\Negocio/ClassUsuario.php');
$personal=new Usuario();
$data=$personal->selectPermiso(-1);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Usuario - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php include '..\layoults\barnav.php'; ?>
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">INGRESAR UN NUEVO USUARIO</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\usuario\store.php" id="frm_usuario">
              <input type="hidden" name="operation" value="1">
              <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre de Usuario</label>
                    <input type="text" class="form-control" name="usuario">
                  </div>
                  <div class="form-group">
                    <label class="bmd-label-floating">Contraseña</label>
                    <input type="password" class="form-control" name="pass">
                  </div>
                  <div class="form-group">
                    <label class="bmd-label-floating">Confirmar la Contraseña</label>
                    <input type="password" class="form-control" name="pass">
                  </div>
                  <h3>Permisos</h3>
                  <br>
              <div class="col-md-6">
              <?php
                    while ($row=mysqli_fetch_array($data))
                    {
                    ?>
                  
                  <div class="checkbox col-md-6">
                    <label>
                      <input type="checkbox" name="<?php echo $row['id_permiso']; ?>"> <?php echo $row['descripcion']?>
                    </label>
                  </div>

                    <?php
                    }
                    ?>
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
        $('#frm_usuario').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        message: 'Valor no valido',
        fields: 
        {
            usuario:
            {
                validators:
                {
                    notEmpty:
                    {
                        message:'Ingrese un nombre de usuario'
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
