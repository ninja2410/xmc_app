<?php
require_once('..\..\Negocio/ClassPago.php');
$pago=new Pago();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registrar Pago</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body>
    <?php include '..\layoults\barnav.php'; ?>
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">REGISTRAR PAGO</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\pago\store.php">
              <input type="hidden" name="operation" value="1">
              <input type="hidden" name="socio" value="<?php echo $_GET['id']; ?>">
              <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label class="bmd-label-floating">Meses Atrasados:</label>
                      <input type="text" class="form-control" name="pending" value="<?php echo $pago->estado_pagos($_GET['id']);?>">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label class="bmd-label-floating">fecha ultimo pago:</label>
                      <input type="text" name="" class="form-control" value="<?php echo $pago->mesSolvente($_GET['id']); ?>">
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label class="bmd-label-floating">Precio por mes:</label>
                      <input type="text" class="form-control" name="member" value="<?php echo $_GET['membresia'];?>">
                    </div>
                  </div>
                <br>
                <div class="col-md-12">
                  <div class="col-md-3">
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Total a Pagar:</label>
                      <input type="number" class="form-control"  name="amount">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label class="bmd-label-floating">Meses a Pagar:</label>
                      <input type="Number" class="form-control" name="mounts" value="">
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
  </body>
</html>
