<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ayuda</title>
    <?php include '../layoults/headers2.php'; ?>
    <?php include '../layoults/barnavLogged.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <div class="main main-raised">
      <div class="content">
            <div class="card">
        <div class="container-fluid">
          <div class="col-md-12">
              <div class="card-header card-header-danger row">
                <div class="col-md-10">
                  <h3 class="card-title">Ayuda</h3>
                  <p class="category">Formas de ayuda para el sistema</p>
                </div>
              </div>
              <div class="card-body text-center">
                <div>
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="nav nav-pills nav-pills-icons flex-column" role="tablist">
                                <!--
                                                    color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                                                -->
                                <li class="nav-item">
                                    <a class="nav-link active" href="#Manuales" role="tab" data-toggle="tab">
                                        <i class="fas fa-book-open fa-2x"></i> Manuales
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#AcercaDe" role="tab" data-toggle="tab">
                                        <i class="fas fa-info-circle fa-2x"></i> Acerca de
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content">
                                <div class="tab-pane active" id="Manuales">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Manual de usuario</h3>
                                        </div>
                                        <div class="col-md-9">
                                            <a class="media" href="../imagenes/MUsuario.pdf"></a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="../imagenes/MUsuario.pdf" target="blank">
                                                <button class="btn btn-success btn-round btn-sm"><i class="fa fa-eye"></i> Abrir en pestaña</button>
                                            </a>
                                        </div>
                                    </div>
                                    <div>
                                        <br>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Manual de administrador</h3>
                                        </div>
                                        <div class="col-md-9">
                                            <a class="media" href="../imagenes/MUsuario.pdf"></a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="../imagenes/MUsuario.pdf" target="blank">
                                                <button class="btn btn-success btn-round btn-sm"><i class="fa fa-eye"></i> Abrir en pestaña</button>
                                            </a>
                                        </div>
                                    </div>
                                    <div>
                                        <br>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Manual Técnico</h3>
                                        </div>
                                        <div class="col-md-9">
                                            <a class="media" href="../imagenes/MUsuario.pdf"></a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="../imagenes/MUsuario.pdf" target="blank">
                                                <button class="btn btn-success btn-round btn-sm"><i class="fa fa-eye"></i> Abrir en pestaña</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="AcercaDe">
                                    <h3>Acerca de</h3>
                                    <p>Este sistema fue creado por: </p>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4>Edgar Emmanuel Herrera Mull</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <h4>Pablo Felipe García Ajpop</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <h4>Angel Javier Tezó Corado</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <h4>Kevin Eliú Gómez Tezó</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
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
