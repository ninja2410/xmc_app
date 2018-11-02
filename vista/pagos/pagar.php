<?php
require_once('../../Negocio/ClassPago.php');
$pago=new Pago();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registrar pago</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '../layoults/barnavLogged.php'; ?>
    <div class="main main-raised">
    <div class="content">
      
        <div class="card col-md-12">
          <div class="card-header card-header-danger">
            <h3 class="card-title">Registrar pago</h3>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="../pagos/store.php">
              <input type="hidden" name="operation" value="1">
              <input type="hidden" name="socio" value="<?php echo $_GET['id']; ?>">
              <input type="hidden" name="amount" id="amount" value="">
              <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Meses atrasados:</label>
                      <input type="text" class="form-control" name="pending" value="<?php echo $pago->estado_pagos($_GET['id']);?>">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Fecha de último pago:</label>
                      <input type="text" name="" class="form-control" value="<?php echo $pago->mesSolvente($_GET['id']); ?>">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Precio por mes:</label>
                      <input type="text" class="form-control"id="price" name="member" value="<?php echo $_GET['membresia'];?>">
                    </div>
                  </div>
                 </div>
                <br>
                <div class="row" style="text-align:center;">
                  <div class="col-lg-12">
                    <label class="bmd-label-floating">Total a pagar:</label>
                    <h1 id="total">Q <?php echo $_GET['membresia']; ?></h1>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-6">
                      <div class="container">
                        <div class="row">
                          <label>Meses a cancelar:</label>
                        		<div class="col-xs-3 col-xs-offset-3">
                        			<div class="input-group number-spinner">
                        				<span class="input-group-btn data-dwn">
                        					<button type="button" class="btn btn-info btn-info" data-dir="dwn"><span>-</span></button>
                        				</span>
                        				<input type="text" name="mounts" id="mnt" class="form-control text-center" value="1" min="1" >
                        				<span class="input-group-btn data-up">
                        					<button type="button" class="btn btn-success btn-info" data-dir="up"><span>+</span></button>
                        				</span>
                        			</div>
                    		</div>
                    	</div>
                      </div>
                    </div>
                    <?php include '../layoults/botones.php'; ?>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      
    </div>
    </div>
    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
  </body>
  <script type="text/javascript">
    $(document).ready(function(){
      var action;
      var total;
      var precio;
      $('#mnt').blur(function(){
        total=$('#price').val()*$(this).val();
        document.getElementById('total').innerHTML='Q '+parseFloat(total);
        document.getElementById('amount').value=total;
      });
          $(".number-spinner button").mousedown(function () {
              btn = $(this);
              input = btn.closest('.number-spinner').find('input');

              btn.closest('.number-spinner').find('button').prop("disabled", false);

          	if (btn.attr('data-dir') == 'up') {
                  action = setInterval(function(){
                      if ( input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max')) ) {
                          input.val(parseInt(input.val())+1);
                          total=$('#price').val()*input.val();
                          document.getElementById('total').innerHTML='Q '+parseFloat(total);
                          document.getElementById('amount').value=total;
                      }else{
                          btn.prop("disabled", true);
                          clearInterval(action);
                      }
                  }, 50);
          	} else {
                  action = setInterval(function(){
                      if ( input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min')) ) {
                          input.val(parseInt(input.val())-1);
                          total=$('#price').val()*input.val();
                          document.getElementById('total').innerHTML='Q '+parseFloat(total);
                          document.getElementById('amount').value=total;
                      }else{
                          btn.prop("disabled", true);
                          clearInterval(action);
                      }
                  }, 50);
          	}
          }).mouseup(function(){
              clearInterval(action);
          });
    });
  </script>
</html>
