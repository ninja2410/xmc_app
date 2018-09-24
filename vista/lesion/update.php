<?php
require_once('..\..\Negocio/ClassLesion.php');
$lesion=new Lesion();
$data=$lesion->select($_GET['id']);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>lesions - Actualizar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php
    include '..\layoults\barnav.php';
    ?>
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Actualizar lesion</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\lesion\store.php" id="frm_lesion">
              <input type="hidden" name="operation" value="2">
              <input type="hidden" name="id" value="<?php echo $data['id_lesion'] ?>">
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input name="name" type="text" class="form-control" value="<?php echo $data['nombre'] ?>">
                  </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Descripcion</label>
                    <div class="form-group">
                      <label class="bmd-label-floating"> Describa en qué consiste la lesion a agregar.</label>
                      <textarea class="form-control" rows="5" name="description" value=""><?php echo $data['descripcion'] ?></textarea>
                    </div>
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
        $('#frm_lesion').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        message: 'Valor no valido',
        fields: {
            name:{
                validators:{
                    notEmpty:{
                        message:'Ingrese un nombre de lesión'
                    },
                    regexp:{
                      regexp: /^[a-zA-Z\s]*$/,
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
