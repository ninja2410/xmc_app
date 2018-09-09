<?php
require_once('..\..\Negocio/ClassBeneficio.php');
if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}

if(isset($_POST['name'])){
  $nombre=$_POST['name'];
}
if(isset($_POST['status'])){
  $estado=$_POST['status'];
}
if(isset($_POST['description'])){
  $descripcion=$_POST['description'];
}
if (isset($_POST['id'])) {
  $id_beneficio=$_POST['id'];
}
$beneficio=new Beneficio();
if ($operacion=="1") {
  $beneficio->insert($descripcion, $estado, $nombre);
}
elseif($operacion=="2") {
  $beneficio->update($id_beneficio, $descripcion, $estado, $nombre);
} elseif ($operacion=="3") {
  $beneficio->delete($id_beneficio);
}
header('Location:index.php');
?>
