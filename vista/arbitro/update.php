<?php
require_once('..\..\Negocio/ClassArbitro.php');
$arbitro=new Arbitro();
$data=$arbitro->select($_GET['id']);
?>

<?php
require_once('..\..\Negocio/ClassTipoArbitro.php');
$tipoarbitro=new TipoArbitro();
$data2=$tipoarbitro->select(-1);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Árbitro - Actualizar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '..\layoults\barnav.php'; ?>
    <div class="main main-raised" >
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title">ACTUALIZAR ÁRBITRO</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\arbitro\store.php" id="frm_arbitro">
              <input type="hidden" name="operation" value="2">
              <input type="hidden" name="id" value="<?php echo $data['id_arbitro']; ?>">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $data['nombre']; ?>">
                  </div>
                </div>
             </div>
                
            <!-- <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Tipo de árbitro</label>
                    <select class="form-control" name="id_tipo_arbitro" >
                      <php
                      while ($row=mysqli_fetch_array($data2)) {
                          $valor = $row['id_tipo_arbitro'];
                          $texto = $row['descripcion'];
                          echo '<option value="'.$valor.'">'.$texto.'</option>';
                      }
                        ?>
                    </select>
                  </div>
                </div> -->
                
                <!-- </div> -->
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
      $('#frm_arbitro').bootstrapValidator({
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
        }
      })
    });
    </script>
  </body>
</html>
