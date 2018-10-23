<?php
require_once('..\..\Negocio/ClassLesionJugador.php');
require_once('..\..\Negocio/ClassTratamiento.php');
require_once('..\..\Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();

if (isset($_POST['prescripciones'])) {
  $prescriociones=explode(',', $_POST['prescripciones']);
}
if (isset($_POST['medicamentos'])) {
  $medicamentos=explode(',', $_POST['medicamentos']);
}

if (isset($_POST['cantidades'])) {
  $cantidades=explode(',',$_POST['cantidades']);
}

if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
if(isset($_POST['fecha_inicio'])){
  $f_inicio=$_POST['fecha_inicio'];
}

if(isset($_POST['fecha_recuperacion'])){
  $f_final=$_POST['fecha_recuperacion'];
}
if(isset($_POST['les'])){
  $lesion=$_POST['les'];
}
if(isset($_POST['les'])){
  $lesion_j=$_POST['les'];
}
if (isset($_POST['med'])) {
  $medico=$_POST['med'];
}
if (isset($_POST['jug'])) {
  $jugador=$_POST['jug'];
}
if (isset($_POST['obs'])) {
  $observaciones=$_POST['obs'];
}
if (isset($_POST['mot'])) {
  $motivo=$_POST['mot'];
}

if (isset($_POST['id'])) {
  $id_lesion=$_POST['id'];
}
$lesion=new LesionJugador();
$tra=new Tratamiento();
if ($operacion=="1") {
  $bit->insert('Agrego una nueva lesion', $_SESSION['id']);
  $lesion->insert($f_inicio, $f_final, 1, $motivo, $jugador, $lesion_j, $medico, $observaciones);
  $id=$lesion->id();
  for ($i=0; $i < count($cantidades); $i++) {
    $tra->insert($cantidades[$i], $medicamentos[$i], $prescriociones[$i], $id);
  }
}
elseif($operacion=="2") {
  $bit->insert('Agrego una nueva lesion', $_SESSION['id']);
  $lesion->update($id_lesion, $f_inicio, $f_final, 1, $motivo, $jugador, $lesion_j, $medico, $observaciones);
} elseif ($operacion=="3") {
  $lesion->delete($id_lesion);
}
header('Location:index.php');
?>
