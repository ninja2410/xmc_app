<?php
require_once('..\..\Negocio/ClassUsuario.php');
$personal=new Usuario();
$data=$personal->selectPermiso(-1);
$dataUs=$personal->select($_GET['id']);
$usuario = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Usuario - Actualizar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php include '..\layoults\barnav.php'; ?>
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">ACTUALIZAR USUARIO</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\usuario\store.php" id="frm_usuario">
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
                  <h3>Permisos</h3>
                  <br>
              <div class="col-md-6">
              <?php
                    while ($row=mysqli_fetch_array($data))
                    {
                    ?>
                  
                  <div class="checkbox col-md-6">
                    <label>
                      <input type="checkbox" id="<?php echo $row['id_permiso']; ?>" name="<?php echo $row['id_permiso']; ?>"> <?php echo $row['descripcion']?>
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
     var us=<?php echo $_GET['id']; ?>;
      $(document).ready(function(){
        var url = "searchPermiso.php";
        $.ajax({
           type: "POST",
           url: url,
           dataType: "json",
           data: {"id_us":us},
           success: function(data)
           {
             for(var i = 0; i < data.length; i++)
             {
              $("#"+data[i].id).attr('checked','checked');
             };
             
             console.log(data);
           }
      });

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
