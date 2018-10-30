<?php
require_once('..\..\Negocio/ClassPrensa.php');
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

if(isset($_POST['apellido'])){
  $apellido=$_POST['apellido'];
}

if(isset($_POST['telefono'])){
  $telefono=$_POST['telefono'];
}

if(isset($_POST['empresa'])){
    $empresa=$_POST['empresa'];
  }

  if(isset($_POST['partido'])){
    $partido=$_POST['partido'];
  }

  if(isset($_POST['estado'])){
    $estado=$_POST['estado'];
  }

if (isset($_POST['id'])) {
  $id_prensa=$_POST['id'];
}
$accion=new Prensa();
if ($operacion=="1") {
  $bit->insert('Se agrego no personal de comunicacion'.$id,$_SESSION['id']);
  $accion->insert($nombre, $apellido, $telefono, $empresa);
  $_SESSION['mensaje']="El reportero se ha almacenado con éxito!";
}
elseif($operacion=="2") {
  $bit->insert('Se actualizo el personal de comunicacion'.$id,$_SESSION['id']);
  $accion->update($id_prensa, $nombre, $apellido, $telefono, $empresa);
  $_SESSION['mensaje']="El reportero se ha modificado con éxito!";
} elseif ($operacion=="3") {
  $accion->delete($id_prensa);
  $_SESSION['mensaje']="El reportero se ha eliminado con éxito!";
}elseif ($operacion=="5") 
{
  $accion->desasignar($id_prensa);
  $_SESSION['mensaje']="El reportero se ha eliminado con éxito!";
  header('Location:prensa.php?id='.$partido);
}

?>
