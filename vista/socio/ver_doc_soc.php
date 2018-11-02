<?php
require_once('../../Negocio/ClassCategoriaDocumentos.php');
$categoria=new CatDocumentos();
$cat=$categoria->select(-1);

require_once('../../Negocio/ClassDocumento.php');
$documento=new Documento();
$data=$documento->select($_GET['id']);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Documento - Visualizar</title>
    <?php include '../layoults/headers2.php'; ?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '../layoults/barnavLogged.php'; ?>

    <div class="main main-raised">
      <div class="content">

          <div class="card col-md-12">
            <div class="card-header card-header-danger">
              <h3 class="card-title">Visualizar documento</h3>
              <p class="card-category">Complete los campos siguientes</p>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Fecha</label>
                      <input readonly type="text" class="form-control" readonly name="fecha" value="<?php echo $data['FECHA']; ?>">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Descripción</label>
                      <input type="text" class="form-control" readonly name="descripcion" value="<?php echo $data['descripcion']; ?>">
                    </div>
                  </div>
                  </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Categorías</label>
                      <select disabled class="form-control" name="categoria" >
                        <?php
                        while ($row=mysqli_fetch_array($cat)) {
                         ?>
                         <option value="<?php echo $row['id_categoria_documentos'];?>" <?php if ($row['id_categoria_documentos']==$data['id_categoria_documentos']) {
                           echo "selected";
                         } ?>><?php echo $row['nombre']; ?></option>
                         <?php
                        }
                          ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <a class="media" href="../imagenes/doc_soc/<?php echo $data['path']; ?>"></a>
                  </div>
                  <div class="col-md-2">
                    <a href="../imagenes/doc_soc/<?php echo $data['path']; ?>" target="blank">
                    <button class="btn btn-success btn-round btn-sm"><i class="fa fa-eye"></i> Abrir en pestaña</button>
                  </div>
                </div>
              </div>
                <a href="javascript:history.back(-1);"> <button type="button" class="btn btn-info pull-right btn-round"><i class="fas fa-undo-alt fa-lg"></i> Regresar</button></a>
                <div class="clearfix"></div>
            </div>
          </div>

      </div>
    </div>

    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
    <script type="text/javascript">
    $('a.media').media({width:500, height:400});
    function printDiv(nombreDiv) {
     var contenido= document.getElementById(nombreDiv).innerHTML;
     var contenidoOriginal= document.body.innerHTML;

     document.body.innerHTML = contenido;

     window.print();

     document.body.innerHTML = contenidoOriginal;
    }

    </script>
  </body>
</html>
