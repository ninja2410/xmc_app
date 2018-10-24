<?php
require_once('..\..\Negocio/ClassMembresia.php');
$membresia=new Membresia();
$data=$membresia->select($_GET['id']);
$datame=$membresia->selectBeneficio(-1);
 ?>
 <!-- UPDATE ACTUALIZADO -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Membresía - Actualizar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '..\layoults\barnav.php'; ?>
    <div class="main main-raised">
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h3 class="card-title">Actualizar membresía</h3>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\membresia\store.php" id="frm_membresia">
              <input type="hidden" name="operation" value="2">
              <input type="hidden" name="id" value="<?php echo $data['id_membresia']; ?>">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input name="nombre" type="text" class="form-control" value="<?php echo $data['nombre']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Descripción</label>
                    <input name="descripcion" type="text" class="form-control" value="<?php echo $data['descripcion']; ?>">
                  </div>
                </div>
              </div>
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Precio</label>
                    <input type="text" class="form-control" name="precio" value="<?php echo $data['precio']; ?>">
                  </div>
                </div>
              </div>
              <h3>Beneficios</h3>
              <br>
              <div class="row">
              <div class="col-md-6">
              <?php
                    while ($row=mysqli_fetch_array($datame))
                    {
                    ?>
                  
                  <div class="checkbox col-md-6">
                    <label>
                      <input type="checkbox" id="<?php echo $row['id_beneficio']; ?>" name="<?php echo $row['id_beneficio']; ?>"> <?php echo $row['nombre']?>
                    </label>
                  </div>

                    <?php
                    }
                    ?>
              </div>
              <div>
              
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

      var me=<?php echo $_GET['id']; ?>;
      $(document).ready(function(){
        var url = "searchBeneficio.php";
        $.ajax({
           type: "POST",
           url: url,
           dataType: "json",
           data: {"id_me":me},
           success: function(data)
           {
             for(var i = 0; i < data.length; i++)
             {
              $("#"+data[i].id).attr('checked','checked');
             };
             
             console.log(data);
           }
      });
      $('#frm_membresia').bootstrapValidator({
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
            descripcion:{
                validators:{
                    notEmpty:{
                        message:'Ingrese una descripcion'
                    },
                    regexp:{
                      regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]*$/, 
                      //  message: 'Solo se aceptan letras y números'
                      }
                  }
              },
        }
      })
    });
    </script>
  </body>
</html>
