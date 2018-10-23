<?php
require_once('..\..\Negocio/ClassEstadio.php');
require_once('..\..\Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();

if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
echo json_encode($_POST);
if(isset($_POST['nombre'])){
  $nombre=$_POST['nombre'];
}

if(isset($_POST['direccion'])){
  $direccion=$_POST['direccion'];
}
if(isset($_POST['ciudad'])){
  $ciudad=$_POST['ciudad'];
}

if(isset($_POST['estado'])){
  $estado=$_POST['estado'];
}

if(isset($_POST['telefono'])){
  $telefono=$_POST['telefono'];
}

if (isset($_POST['id'])) {
  $id_estadio=$_POST['id'];
}
$accion=new Estadio();
if ($operacion=="1") {
  $bit->insert('Agrego una nuevo estadio ', $_SESSION['id']);
  $accion->insert($nombre, $direccion, $telefono, $ciudad);
  $_SESSION['mensaje']="El estadio se ha almacenado con éxito!";
}
elseif($operacion=="2") {
  $bit->insert('Actualizo el estadio '.$id_estadio, $_SESSION['id']);
  $accion->update($id_estadio, $nombre, $direccion, $telefono,$ciudad);
  $_SESSION['mensaje']="El estadio se ha actualizado con éxito!";
} elseif ($operacion=="3") {
  $accion->delete($id_estadio);
  $_SESSION['mensaje']="El estadio se ha eliminado con éxito!";
}
header('Location:index.php');
?>
