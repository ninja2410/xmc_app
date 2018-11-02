<?php
require_once('../../Negocio/ClassLesionJugador.php');
require_once('../../Negocio/ClassTratamiento.php');
require_once('../../Negocio/ClassBitacora.php');
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
  $dt_=$_POST['fecha_inicio'];
  $arr_=explode("/", $dt_);
  $f_inicio=$arr_[2].'-'. $arr_[1].'-'. $arr_[0];
}

if(isset($_POST['fecha_recuperacion'])){
  if ($_POST['fecha_recuperacion']!="") {
    $dt_=$_POST['fecha_recuperacion'];
    $arr_=explode("/", $dt_);
    $f_final=$arr_[2].'-'. $arr_[1].'-'. $arr_[0];
  }
  else{
    $f_final=$f_inicio;
  }

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
if (isset($_POST['costo'])) {
  $costo=$_POST['costo'];
}
$lesion=new LesionJugador();
$tra=new Tratamiento();
if ($operacion=="1") {
  $bit->insert('Agrego una nueva lesion', $_SESSION['id']);
  $lesion->insert($f_inicio, $f_final, 1, $motivo, $jugador, $lesion_j, $medico, $observaciones, $costo);
  $id=$lesion->id();
  for ($i=0; $i < count($cantidades); $i++) {
    $tra->insert($cantidades[$i], $medicamentos[$i], $prescriociones[$i], $id);
  }
  $_SESSION['mensaje']="La lesión se ha almacenado con éxito!";
}
elseif($operacion=="2") {
  $bit->insert('Agrego una nueva lesion', $_SESSION['id']);
  $lesion->update($id_lesion, $f_inicio, $f_final, 1, $motivo, $jugador, $lesion_j, $medico, $observaciones, $costo);
  $_SESSION['mensaje']="La lesión se ha modificado con éxito!";
} elseif ($operacion=="3") {
  $lesion->delete($id_lesion);
  $_SESSION['mensaje']="La lesión se ha eliminado con éxito!";
} elseif ($operacion=="4") {
  $tra->insert($_POST['cantidad'], $_POST['medicamento'], $_POST['prescripcione'], $_POST['id_lesion']);
} elseif ($operacion=="5") {
  $tra->delete($_POST['id']);
}
header('Location:index.php');
?>
