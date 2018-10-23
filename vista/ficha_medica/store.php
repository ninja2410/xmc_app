<?php
require_once('..\..\Negocio/ClassFichaMedica.php');
require_once('..\..\Negocio/ClassDetalleFichaMedica.php');
require_once('..\..\Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();


if (isset($_POST['signosVitales'])) {
  $signosVitales = json_decode($_POST['signosVitales']);
}
if (isset($_POST['criometria'])) {
  $criometria = json_decode($_POST['criometria']);
}
if (isset($_POST['rodilla'])) {
  $rodilla = json_decode($_POST['rodilla']);
}
if (isset($_POST['tobillo'])) {
  $tobillo = json_decode($_POST['tobillo']);
}
if (isset($_POST['meniscos'])) {
  $meniscos = json_decode($_POST['meniscos']);
}
if (isset($_POST['musculos'])) {
  $musculos = json_decode($_POST['musculos']);
}
if (isset($_POST['alineamiento'])) {
  $alineamiento = json_decode($_POST['alineamiento']);
}
if (isset($_POST['cuello'])) {
  $cuello = json_decode($_POST['cuello']);
}
if (isset($_POST['pecho'])) {
  $pecho = json_decode($_POST['pecho']);
}
if (isset($_POST['subescapular'])) {
  $subescapular = json_decode($_POST['subescapular']);
}
if (isset($_POST['supraespinal'])) {
  $supraespinal = json_decode($_POST['supraespinal']);
}
if (isset($_POST['abdominal'])) {
  $abdominal = json_decode($_POST['abdominal']);
}
if (isset($_POST['otra'])) {
  $otra = json_decode($_POST['otra']);
}

if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
if(isset($_POST['fecha'])){
  $fecha = date("Y/m/d", strtotime($_POST['fecha']));
}
if(isset($_POST['jugador'])){
  $id_jugador=$_POST['jugador'];
}
if(isset($_POST['status'])){
  if($_POST['status']=="on" || $_POST['status']=="1"){
    $estado=1;
  }
  else{
    $estado=0;
  }
}

if(isset($_POST['grasa'])){
    $grasa=$_POST['grasa'];
  }
  if(isset($_POST['peso'])){
    $peso=$_POST['peso'];
  }
  if(isset($_POST['talla'])){
    $talla=$_POST['talla'];
  }
if (isset($_POST['id'])) {
  $id_ficha=$_POST['id'];
}
$estado=1;
$fichamedica=new FichaMedica();
if ($operacion=="1") {
  $bit->insert('Agrego una nueva ficha medica al jugador'.$id_jugador, $_SESSION['id']);
  $detalle=new DetalleFM();
  $fichamedica->insert($fecha, $estado, $id_jugador, $grasa, $peso, $talla);
  $id_tmp=$fichamedica->id();
  foreach ($signosVitales as $key => $value) {
    $detalle->insert($value->valor, $value->campo, $id_tmp);
  }
  foreach ($criometria as $key => $value) {
    $detalle->insert($value->valor, $value->campo, $id_tmp);
  }
  foreach ($rodilla as $key => $value) {
    $detalle->insert($value->valor, $value->campo, $id_tmp);
  }
  foreach ($tobillo as $key => $value) {
    $detalle->insert($value->valor, $value->campo, $id_tmp);
  }
  foreach ($meniscos as $key => $value) {
    $detalle->insert($value->valor, $value->campo, $id_tmp);
  }
  foreach ($musculos as $key => $value) {
    $detalle->insert($value->valor, $value->campo, $id_tmp);
  }
  foreach ($alineamiento as $key => $value) {
    $detalle->insert($value->valor, $value->campo, $id_tmp);
  }
  foreach ($cuello as $key => $value) {
    $detalle->insert($value->valor, $value->campo, $id_tmp);
  }
  foreach ($pecho as $key => $value) {
    $detalle->insert($value->valor, $value->campo, $id_tmp);
  }
  foreach ($subescapular as $key => $value) {
    $detalle->insert($value->valor, $value->campo, $id_tmp);
  }
  foreach ($supraespinal as $key => $value) {
    $detalle->insert($value->valor, $value->campo, $id_tmp);
  }
  foreach ($abdominal as $key => $value) {
    $detalle->insert($value->valor, $value->campo, $id_tmp);
  }
  foreach ($otra as $key => $value) {
    $detalle->insert($value->valor, $value->campo, $id_tmp);
  }
  header('Location:index.php');
}
elseif($operacion=="2") {
  $bit->insert('Actualizo la ficha medica del jugador '.$id_jugador, $_SESSION['id']);
  $detalle=new DetalleFM();
  $fichamedica->update($id_ficha, $fecha, $estado, $id_jugador, $grasa, $peso, $talla);
  foreach ($signosVitales as $key => $value) {
    echo $value->ID;
    $detalle->update($value->valor, $value->ID ,$value->campo, $id_ficha);
  }
} elseif ($operacion=="3") {
  $fichamedica->delete($id_ficha);
}
header('Location:index.php');
?>
