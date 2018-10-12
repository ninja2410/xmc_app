<?php
require_once('..\..\Negocio/ClassCategoriaDocumentos.php');
$categoria=new CatDocumentos();
$data=$categoria->select(-1);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Documento - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
  </head>
  <body>
    <?php include '..\layoults\barnav.php'; ?>
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">INGRESAR DOCUMENTOS</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\documento_digital\store.php" enctype="multipart/form-data" id="frm_document">
              <input type="hidden" name="operation" value="1">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Fecha</label>
                    <input type="text" class="form-control" name="fecha">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="bmd-label-floating">Descripción</label>
                    <input type="text" class="form-control" name="descripcion">
                  </div>
                </div>
                </div>
              <div class="row">
                <div class="col-md-2">
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
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Categorías</label>
                    <select class="form-control" name="categoria">
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                       <option value="<?php echo $row['id_categoria_documentos']; ?>"><?php echo $row['nombre']; ?></option>
                       <?php
                      }
                        ?>
                    </select>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#frm_document').bootstrapValidator({
      feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      message: 'Valor no valido',
      fields: {
          fecha:{
              validators:{
                  notEmpty:{
                      message:'Ingrese una fecha'
                  }
                }
            },
            descripcion:{
                validators:{
                    notEmpty:{
                        message:'Ingrese una descripcion.'
                    }
                  }
              },
              img:{
                validators:{
                  notEmpty:{
                    message:'Seleccione una imagen.'
                  }
                }
              },
              categoria:{
                validators:{
                  notEmpty:{
                    message:'Seleccione una categoria'
                  }
                }
              }
        }
    });
    });
    </script>
  </body>
</html>
