<?php
require_once('..\..\Negocio/ClassMembresia.php');
$be=new Membresia();
$data=$be->selectBeneficio(-1);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Membresía - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '..\layoults\barnav.php'; ?>
    <div class="main main-raised">
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h3 class="card-title">Insertar membresía</h3>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\membresia\store.php"  id="frm_membresia">
              <input type="hidden" name="operation" value="1">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label >Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Descripción</label>
                    <input type="text" class="form-control" name="descripcion">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Precio</label>
                    <input type="text" class="form-control" name="precio">
                  </div>
                </div>
              </div>
              <h3>Beneficios</h3>
                  <br>
              <div class="row">
              <div class="col-md-6">
              <?php
                    while ($row=mysqli_fetch_array($data))
                    {
                    ?>
                  
                  <div class="checkbox col-md-6">
                    <label>
                      <input type="checkbox" name="<?php echo $row['id_beneficio']; ?>"> <?php echo $row['nombre']?>
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
    $(document).ready(function(){
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
                      message: 'Solo se aceptan letras y números'
                      }
                  }
              },
              precio:{
                validators:{
                    notEmpty:{
                        message:'Ingrese un precio'
                    },
                    regexp:{
                      regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]*$/, 
                      message: 'Solo se aceptan letras y números'
                      }
                  }
              }
        }
      })
    });
    </script>
     
  </body>
</html>
