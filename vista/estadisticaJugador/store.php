<?php

require_once('..\..\Negocio/ClassEstadisticaJugador.php');
echo $_POST['estadisticas'];
echo $_POST['jugador'];
echo $_POST['partido'];
if (isset($_POST['estadisticas'])) {
  $estadisticas = json_decode($_POST['estadisticas']);
}
if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
if(isset($_POST['jugador'])){
  $id_jugador=$_POST['jugador'];
}
if(isset($_POST['partido'])){
  $id_partido=$_POST['partido'];
}

$estado=1;
$estadistica=new EstadisticaJugador();
if ($operacion=="1") {
  foreach ($estadisticas as $key => $value) {
    $estadistica->insert($value->campo, $value->minuto, $value->valor, 1, $id_jugador, $id_partido);
  }
}
elseif($operacion=="2") {
  $detalle=new DetalleFM();
  $fichamedica->update($id_ficha, $fecha, $estado, $id_jugador, $grasa, $peso, $talla);
  foreach ($signosVitales as $key => $value) {
    echo $value->ID;
    $detalle->update($value->valor, $value->ID ,$value->campo, $id_ficha);
  }
} elseif ($operacion=="3") {
  $fichamedica->delete($id_ficha);
}
//header('Location:index.php');
 ?>
