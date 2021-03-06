<?php
require_once('../../Negocio/ClassUsuario.php');
$personal=new Usuario();
$data=$personal->selectPermiso(-1);
$dataUs=$personal->select($_GET['id']);
$usuario = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">

    <title>Usuario - Actualizar</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '../layoults/barnavLogged.php'; ?>
    <div class="main main-raised">
    <div class="content">
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">ACTUALIZAR USUARIO</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
          <div class="row">
          <div class="col-md-4">
            <div class="col-md-8">
                <a href="<?php echo '../../vista/usuario/permisos.php?id='.$_GET['id'];?>">
                <button class="btn btn-success btn-round"><i class="fas fa-notes-medical fa-lg"></i>Agregar o Quitar permisos</button></a>
            </div>
          </div>
            <div class="col-md-8">
            <form method="post" enctype="multipart/form-data" action="../usuario/store.php" id="frm_usuario">
              <input type="hidden" name="operation" value="2">
              <input type="hidden" name="id" value="<?php echo $usuario; ?>">
              <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                  <label class="bmd-label-floating">Nombre</label>
                    <input type="text" class="form-control" value="<?php echo $dataUs['nombre']; ?>" name="nombre">
                  </div>
                  <div class="form-group">
                    <label class="bmd-label-floating">Apellido</label>
                    <input type="text" class="form-control" value="<?php echo $dataUs['apellido']; ?>" name="apellido">
                  </div>
                  <div class="form-group">
                    <label class="bmd-label-floating">Correo</label>
                    <input type="text" class="form-control" value="<?php echo $dataUs['email']; ?>" name="email">
                  </div>
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre de Usuario</label>
                    <input type="text" class="form-control" value="<?php echo $dataUs['nombre_usuario']; ?>" name="usuario" >
                  </div>
                  <div class="form-group">
                    <label class="bmd-label-floating">Contraseña</label>
                    <input type="password" class="form-control" name="pass">
                  </div>
                  <div class="form-group">
                    <label class="bmd-label-floating">Confirmar la contraseña</label>
                    <input type="password" class="form-control" name="pass2">
                  </div>              
              </div>
            </div>
            
                <div class="col-md-4">
                  <img src="../imagenes/<?php echo $dataUs['foto']; ?>" style="width: 200px; height: 150px;" alt="">
                  <br>
                  <label><b>Imagen actual</b></label>
                </div>
                <div class="col-md-4">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                    <div>
                      <span class="btn btn-default btn-file"><span class="fileinput-new">Buscar Nueva</span><span class="fileinput-exists">Cambiar</span><input type="file" name="img"></span>
                      <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
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
      </div>
    </div>
    </div>
    </div>

    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
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
            }
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
});
      });



    </script>
  </body>
</html>
