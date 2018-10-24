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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '..\layoults\barnav.php'; ?>
    <div class="main main-raised">
    <div class="content">
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">INGRESAR UN NUEVO USUARIO</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="..\usuario\store.php" id="frm_usuario">
              <input type="hidden" name="operation" value="1">
              <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                  </div>
                  <div class="form-group">
                    <label class="bmd-label-floating">Apellido</label>
                    <input type="text" class="form-control" name="apellido">
                  </div>
                  <div class="form-group">
                    <label class="bmd-label-floating">Correo</label>
                    <input type="text" class="form-control" name="email">
                  </div>
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre de usuario</label>
                    <input type="text" id="usuario" class="form-control" name="usuario">
                    <div id="resultado"></div>
                  </div>
  
                  <div class="form-group">
                    <label class="bmd-label-floating">Contraseña</label>
                    <input type="password" class="form-control" name="pass">
                  </div>
                  <div class="form-group">
                    <label class="bmd-label-floating">Confirmar la contraseña</label>
                    <input type="password" class="form-control" name="pass2">
                  </div>
                  <div class="col-md-4">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                            <div>
                              <span class="btn btn-default btn-file"><span class="fileinput-new">Buscar imagen</span><span class="fileinput-exists">Cambiar</span><input type="file" name="img"></span>
                              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                            </div>
                          </div>
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
    </div>
    </div>
    </div>
    </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
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
              message: 'El nombre de usuario no esta disponible',
                validators: {
                  notEmpty:
                    {
                        message:'Este campo no puede quedar vacio'
                    },
                    remote: {
                        message: 'El nombre de usuario no esta disponible',
                        url: 'comprobar.php'
                    }
                }
            },
            nombre:
            {
                validators:
                {
                    notEmpty:
                    {
                        message:'Este campo no puede quedar vacio'
                    }
                }
            },
            apellido:
            {
                validators:
                {
                    notEmpty:
                    {
                        message:'Este campo no puede quedar vacio'
                    }
                }
            },
            email:
            {
                validators:
                {
                    notEmpty:
                    {
                        message:'Este campo no puede quedar vacio'
                    },
                    emailAddress: {
                        message: 'Ingrese una direccion de correo valida'
                    }
                }
            },
            pass:
            {
                validators:
                {
                    notEmpty:
                    {
                        message:'Este campo no puede quedar vacio'
                    },
                    regexp:
                    {
                            regexp: /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/,
                              message: 'Contraseña no valida, debe contener almenos 1 letra mayúscula, 1 letra minúscula, 1 número, 1 caracter especial y debe ser mayor a 8 dígitos'        
                    },
                }
            },
            pass2:
            {
                validators:
                {
                    notEmpty:
                    {
                        message:'Este campo no puede quedar vacio'
                    },
                    identical:
                    {
                      field:'pass',
                      message:'Las contraseñas no coninciden'
                    }
                }
            },
        }
    })
      });
    </script>
  </body>
</html>
