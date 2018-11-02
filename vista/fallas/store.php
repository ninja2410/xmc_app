<?php
require_once('../../Negocio/ClassFalla.php');
require_once('../../Negocio/ClassDetalleFalla.php');
require_once('../../Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();

if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
if(isset($_POST['descripcion'])){
  $descripcion=$_POST['descripcion'];
}

if(isset($_POST['sancionE'])){
  $dinero=$_POST['sancionE'];
  $sancion='La multa impuesta fue de Q. '.$dinero;
}
if(isset($_POST['sancionF'])){
  $sancion=$_POST['sancionF'];
}
if(isset($_POST['sancion'])){
  $sancion=$_POST['sancion'];
}
if(isset($_POST['fecha_multa'])){
  $fecha=$_POST['fecha_multa'];
}
if(isset($_POST['jugador'])){
  $id_jugador=$_POST['jugador'];
}

if (isset($_POST['id'])) {
  $id_falla=$_POST['id'];
}
if (isset($_POST['id_DF'])) {
  $id_des_falla=$_POST['id_DF'];
}
$falla=new Falla();
$desFalla = new DetFalla();
if ($operacion=="1") {
  $bit->insert('Agrego una nueva multa', $_SESSION['id']);
  $id_falla2=$desFalla->correlativo();
  $falla->insert($descripcion);
  $desFalla->insert($sancion, $fecha, $id_falla2, $id_jugador);
  $_SESSION['mensaje']="La multa se ha almacenado con éxito!";
}
elseif($operacion=="2") {
  $bit->insert('Se actualizo una multa', $_SESSION['id']);
  $falla->update($id_falla,$descripcion);
  $desFalla->update($id_des_falla,$sancion, $fecha, $id_falla, $id_jugador);
  $_SESSION['mensaje']="La categoria se ha actualizado con éxito!";
}
elseif ($operacion=="3") {
  $bit->insert('Se elimino una multa', $_SESSION['id']);
  $_SESSION['mensaje']="La categoria se ha eliminado con éxito!";
  $falla->delete($id_falla);
}
header('Location:index.php');
?>
