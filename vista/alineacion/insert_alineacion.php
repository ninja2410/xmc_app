<?php
$partido=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alineacion - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  
  <body class="profile-page sidebar-collapse">
  <script type="text/javascript">
  $(function() 
  {
    $( "#autoJugador" ).autocomplete(
    {
      source: 'searchJugador.php',
      minLength: 0,
      select: function(event, ui) 
      { 
        $("#jugador").val(ui.item.id);
      },
    }).focus(function () {
        $(this).autocomplete('search', $(this).val())
      });
    
    $( "#autoPartido" ).autocomplete({
      source: 'searchPartido.php',
      minLength: 0,
      select: function(event, ui) { 
        $("#partido").val(ui.item.id);
    },
    }).focus(function () {
        $(this).autocomplete('search', $(this).val())
      });

      $( "#autoPosicion" ).autocomplete({
      source: 'searchPosicion.php',
      minLength: 0,
      select: function(event, ui) { 
        console.log(ui.item.id);
        $("#posicion").val(ui.item.id);
    },
    }).focus(function () {
        $(this).autocomplete('search', $(this).val())
      });


  });
  </script>
    <?php include '..\layoults\barnav.php'; ?>
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">INGRESAR UN NUEVO ALINEACION</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\alineacion\store.php" id="frm_alineacion">
              <input type="hidden" name="operation" value="1">
              <input type="hidden" name="partido" id="partido"  value="<?php echo $partido; ?>">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Jugador</label>
                    <input type="hidden" id="jugador" name="jugador">
                    <input type="text" id="autoJugador" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Posicion</label>
                    <input type="hidden" name="posicion" id="posicion" >
                    <input type="text" id="autoPosicion" class="form-control">
                  </div>
                </div>
                </div>
              </div>
<div>
              <?php include '..\layoults\botones.php'; ?>
              <div class="clearfix"></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
    <script type="text/javascript">
      

    </script>
  </body>
</html>
