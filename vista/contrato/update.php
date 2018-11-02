<?php
require_once('../../Negocio/ClassContrato.php');
$contrato=new Contrato();
$data=$contrato->select($_GET['id']);
 ?>
<?php
require_once('../../Negocio/ClassDocumento.php');
$documento=new Documento();
$data2=$documento->select(-1);
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contrato - Actualizar</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '../layoults/barnavLogged.php'; ?>
    <div class="main main-raised"> 
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title">ACTUALIZAR CONTRATO</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
          <form method="post", action="../contrato/store.php"  id="frm_contrato">
              <input type="hidden" name="operation" value="2">
              <input type="hidden" name="id" value="<?php echo $data['id_contrato']; ?>">
             <div class="row">
             <div class="col-md-4">
                   <div class="form-group">
                     <label class="bmd-label-floating">Título</label>
                     <input type="text" class="form-control" name="titulo" value="<?php echo $data['titulo']; ?>">
                   </div>
                 </div>

                 <div class="col-md-4">
                   <div class="form-group">
                     <label class="bmd-label-floating">Salario Q.</label>
                     <input type="text" class="form-control" name="salario" value="<?php echo $data['salario']; ?>">
                   </div>
                 </div>
            </div>


              <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                    <label >Fecha inicio</label>
                    <input type="date" class="form-control" name="fecha_inicio" value="<?php echo $data['fecha_inicio']; ?>">
                  </div>
                </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label >Fecha final</label>
                    <input type="date" class="form-control" name="fecha_final" value="<?php echo $data['fecha_final']; ?>">
                 </div>
            </div>  
            </div>
            
            <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Documento digital</label>
                    <select class="form-control" name="id_documento_digital">
                      <?php
                      while ($row=mysqli_fetch_array($data2)) {
                          $valor = $row['ID'];
                          $texto = $row['descripcion'];
                          echo '<option value="'.$valor.'">'.$texto.'</option>';
                        }
                        ?>
                    </select>
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
    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#frm_contrato').bootstrapValidator({
      feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      message: 'Valor no valido',
      fields: {
          titulo:{
              validators:{
                  notEmpty:{
                      message:'Ingrese un título'
                  },
                  regexp:{
                    regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/,
                      message: 'Solo se aceptan letras'
                    }
                }
            },
                salario:{
                    validators:{
                        notEmpty:{
                            message:'Ingrese el salario'
                        },
                        regexp:{
                          regexp: /^[0-9.\s]*$/,
                            message: 'Solo se aceptan números'
                          }
                      }
                  },
                        fecha_inicio:{
                          validators:{
                              notEmpty:{
                                  message:'Seleccione una fecha'
                              }
                            }
                        },
                        fecha_final:{
                          validators:{
                              notEmpty:{
                                  message:'Seleccione una fecha'
                              }
                            }
                        },
        }
      })
    });
    </script>
  </body>
</html>
