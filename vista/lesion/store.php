<?php
require_once('..\..\Negocio/ClassLesion.php');
require_once('..\..\Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();

if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
echo json_encode($_POST);
if(isset($_POST['name'])){
  $nombre=$_POST['name'];
}
if(isset($_POST['status'])){
  if($_POST['status']=="on" || $_POST['status']=="1"){
    $estado=1;
  }
  else{
    $estado=0;
  }
}
if(isset($_POST['description'])){
  $descripcion=$_POST['description'];
}
if (isset($_POST['id'])) {
  $id_lesion=$_POST['id'];
}
$lesion=new Lesion();
if ($operacion=="1") {
  $bit->insert('Agrego una nueva lesion ', $_SESSION['id']);
  $lesion->insert($nombre, $descripcion, 1);
}
elseif($operacion=="2") {
  $bit->insert('Acutalizo la lesion '.$id_lesion, $_SESSION['id']);
  $lesion->update($id_lesion, $nombre, $descripcion, 1);
} elseif ($operacion=="3") {
  $lesion->delete($id_lesion);
}
header('Location:index.php');
?>
