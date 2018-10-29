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
    <?php include '..\layoults\barnavLogged.php'; ?>
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Permisos de usuario</h4>
            <p class="card-category">Marque o desmarque el permiso que desea agregar o quitar</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\usuario\store.php" id="frm_usuario">
              <input type="hidden" name="operation" value="4">
              <input type="hidden" name="id" value="<?php echo $usuario; ?>">
              <h3>Permisos</h3>
                  <br>
              <div class="row">
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
    });

    </script>
  </body>
</html>
