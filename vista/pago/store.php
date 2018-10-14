<?php
require_once('..\..\Negocio/ClassPago.php');
$pago=new Pago();
echo json_encode($_POST);
$operation=$_POST['operation'];
$socio=$_POST['socio'];
$monto=$_POST['amount'];
$meses=$_POST['mounts'];
$membresia=$_POST['member'];
if ($operation==1) {
  $pago->insert($monto, $socio, $meses, $membresia);
}
 ?>
