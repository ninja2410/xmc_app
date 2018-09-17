<?php
require_once('..\..\Negocio/ClassEstadio.php');
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
  $accion->insert($nombre, $direccion, $telefono, $ciudad);
}
elseif($operacion=="2") {
  $accion->update($id_estadio, $nombre, $direccion, $telefono, $ciudad);
} elseif ($operacion=="3") {
  $accion->delete($id_estadio);
}
header('Location:index.php');
?>
