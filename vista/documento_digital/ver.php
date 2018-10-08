<?php
require_once('..\..\Negocio/ClassCategoriaDocumentos.php');
$categoria=new CatDocumentos();
$cat=$categoria->select(-1);

require_once('..\..\Negocio/ClassDocumento.php');
$documento=new Documento();
$data=$documento->select($_GET['id']);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Documento - Modificar</title>
    <?php include '..\layoults\headers2.php'; ?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chocolat/0.4.20/css/chocolat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chocolat/0.4.20/css/chocolat.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chocolat/0.4.20/css/chocolat.min.css.map">
  </head>
  <body>
    <?php include '..\layoults\barnav.php'; ?>

    <div class="main main-raised">
      <div class="content">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">MODIFICAR DOCUMENTOS</h4>
              <p class="card-category">Complete los campos siguientes</p>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Fecha</label>
                      <input readonly type="text" class="form-control" readonly name="fecha" value="<?php echo $data['FECHA']; ?>">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label class="bmd-label-floating">Descripcion</label>
                      <input type="text" class="form-control" readonly name="descripcion" value="<?php echo $data['descripcion']; ?>">
                    </div>
                  </div>
                  </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Categorias</label>
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
                  <div class="col-md-4">
                    <div class="chocolat-parent" data-chocolat-title="Documento" id="print">
                      <a class="chocolat-image" href="..\imagenes\<?php echo $data['path']; ?>" title="<?php echo $data['descripcion']; ?>">
                        <img src="..\imagenes\<?php echo $data['path']; ?>" style="width: 100; height: 150px;" alt="">
                      </a>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <input type="button" class="btn btn-danger pull-left btn-round" onclick="printDiv('print')" value="Imprimir" />
                  </div>
                  </div>
                </div>
                <a href="index.php"> <button type="button" class="btn btn-info pull-right btn-round"><i class="fas fa-undo-alt fa-lg"></i> Regresar</button></a>
                <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chocolat/0.4.20/js/jquery.chocolat.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chocolat/0.4.20/js/jquery.chocolat.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $('.chocolat-parent').Chocolat();
    });
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
