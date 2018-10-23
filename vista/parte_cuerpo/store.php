<?php
require_once('..\..\Negocio/ClassParteCuerpo.php');
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
if(isset($_POST['status'])){
  if($_POST['status']=="on" || $_POST['status']=="1"){
    $estado=1;
  }
  else{
    $estado=0;
  }
}
if (isset($_POST['id'])) {
  $id_parte=$_POST['id'];
}
$parte=new ParteCuerpo();
if ($operacion=="1") {
  $bit->insert('Se agrego una parte del cuerpo', $_SESSION['id']);
  $parte->insert($nombre, $estado);
}
elseif($operacion=="2") {
  $bit->insert('Se acutalizo la parte del cuerpo '.$id_parte, $_SESSION['id']);
  $parte->update($id_parte, $nombre, $estado);
} elseif ($operacion=="3") {
  $parte->delete($id_parte);
}
header('Location:index.php');
?> 
