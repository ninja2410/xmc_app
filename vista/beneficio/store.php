<?php
require_once('..\..\Negocio/ClassBeneficio.php');
require_once('..\..\Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();

if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
if(isset($_POST['name'])){
  $nombre=$_POST['name'];
}

if(isset($_POST['description'])){
  $descripcion=$_POST['description'];
}
if (isset($_POST['id'])) {
  $id_beneficio=$_POST['id'];
}
$beneficio=new Beneficio();
if ($operacion=="1") {
  $bit->insert('Agrego un nuevo beneficio', $_SESSION['id']);
  $beneficio->insert($descripcion, 1, $nombre);
}
elseif($operacion=="2") {
  $bit->insert('Actualizo un beneficio', $_SESSION['id']);
  $beneficio->update($id_beneficio, $descripcion, 1, $nombre);
} elseif ($operacion=="3") {
  $bit->insert('Elimino un beneficio', $_SESSION['id']);
  $beneficio->delete($id_beneficio);
}
header('Location:index.php');
?>
