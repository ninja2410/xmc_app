<?php
require_once('../../Negocio/ClassDetalleFalla.php');
$falla=new DetFalla();
$data=$falla->select($_GET['id']);
 ?>
 <!-- UPDATE ACTUALIZADO -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Categoría - Actualizar</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '../layoults/barnavLogged.php'; ?>
    <div class="main main-raised">
    <div class="content">

        <div class="card col-md-12">
          <div class="card-header card-header-danger">
            <h3 class="card-title">Actualizar categoría</h3>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="../fallas/store.php" id="frm_categoria">
              <input type="hidden" name="operation" value="2">
              <input type="hidden" name="id" value="<?php echo $data['id_falla']; ?>">
              <input type="hidden" name="id_DF" value="<?php echo $data['id_descripcion_falla']; ?>">
                <div class="row">
                  <div class="form-group col-md-4">
                      <label>Fecha de la multa</label>
                      <input type="date" class="form-control" readonly name="fecha_multa" value="<?php echo $data['fecha'];?>">
                  </div>
                  <div class="form-group col-md-4">
                      <label >Descripción</label>
                      <input type="text" class="form-control" name="descripcion" placeholder="El porque se le impondra una multa la jugador." value="<?php echo $data['descripcion'];?>">
                  </div>
                  
                  <div class="form-group col-md-4">
                      <label>Jugador</label>
                      <select class="form-control" name="jugador">
                          <option selected value="<?php echo $data['id_jugador'];?>"><?php echo $data['jugador'];?></option>
                          <?php
                              include_once('../../Negocio/ClassJugador.php');
                              $jugador=new Jugador();
                              $data2=$jugador->select(-1);
                              while ($row = mysqli_fetch_array($data2))
                              {
                                  $valor = $row['id_jugador'];
                                  $texto2 = $row['Nombre'];
                                  $texto = $texto2.' '.$row['apellido'];
                                  echo '<option value="'.$valor.'">'.$texto.'</option>';
                              }
                          ?>
                      </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                      <label >Sanción</label>
                      <input type="text" class="form-control" name="sancion" value="<?php echo $data['sancion'];?>">
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
      $('#frm_falla').bootstrapValidator({
      feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      message: 'Valor no valido',
      fields: {
            descripcion:{
              validators:{
                  notEmpty:{
                      message:'Ingrese un nombre'
                  },
                  regexp:{
                    regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s\.\:]*$/,
                      message: 'Solo se aceptan letras y números'
                    }
                }
            },
            sancion:{
              validators:{
                  notEmpty:{
                      message:'Ingrese el valor economico o la accion de la multa'
                  },
                  regexp:{
                    regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s\.\:]*$/,
                      message: 'Solo se aceptan letras y números'
                    }
                }
            },
        }
      })
    });
    </script>
  </body>
</html>
