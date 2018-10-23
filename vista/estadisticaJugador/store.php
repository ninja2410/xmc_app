<?php

require_once('..\..\Negocio/ClassEstadisticaJugador.php');
require_once('..\..\Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();

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
if(isset($_POST['estadistica'])){
  $estadistica_id=$_POST['estadistica'];
}
if(isset($_POST['dato'])){
  $campo=$_POST['dato'];
}
if(isset($_POST['valor'])){
  $valor=$_POST['valor'];
}
if(isset($_POST['minuto'])){
  $minuto=$_POST['minuto'];
}
$estado=1;
$estadistica=new EstadisticaJugador();
if ($operacion=="1") {
  $bit->insert('Actualizo las estadisticas del jugador'.$id_jugador, $_SESSION['id']);
  foreach ($estadisticas as $key => $value) {
    $estadistica->insert($value->campo, $value->minuto, $value->valor, 1, $id_jugador, $id_partido);
  }
  $_SESSION['mensaje']="La estadística se ha almacenado con éxito!";
}
elseif($operacion=="2") {
  $bit->insert('Actualizo las estadisticas del jugador '.$id_jugador, $_SESSION['id']);
  $detalle=new DetalleFM();
  $fichamedica->update($id_ficha, $fecha, $estado, $id_jugador, $grasa, $peso, $talla);
  foreach ($signosVitales as $key => $value) {
    echo $value->ID;
    $detalle->update($value->valor, $value->ID ,$value->campo, $id_ficha);
  }
  $_SESSION['mensaje']="La estadística se ha modificado con éxito!";
} elseif ($operacion=="3") {
  $fichamedica->delete($id_ficha);
  $_SESSION['mensaje']="La estadística se ha eliminado con éxito!";
}elseif($operacion=="4"){
  if (isset($estadistica_id)) {
    $estadistica->update($estadistica_id, $campo, $minuto, $valor, 1, $id_jugador, $id_partido);
  }
}elseif($operacion=="5"){
  $estadistica->insert($campo, $minuto, $valor, 1, $id_jugador, $id_partido);
  $_SESSION['mensaje']="La estadística se ha almacenado con éxito!";
  header('Location:edit.php?partido='.$id_partido);
}
header('Location:index.php');
 ?>
