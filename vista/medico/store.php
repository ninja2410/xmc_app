<?php
require_once('../../Negocio/ClassMedico.php');
require_once('../../Negocio/ClassBitacora.php');
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
if(isset($_POST['mail'])){
  $mail=$_POST['mail'];
}

if(isset($_POST['f_nacimiento'])){
  $f_nacimiento=$_POST['f_nacimiento'];
}

if(isset($_POST['f_inicio'])){
  $f_inicio=$_POST['f_inicio'];
}

if(isset($_POST['direccion'])){
  $direccion=$_POST['direccion'];
}

if(isset($_POST['telefono'])){
  $telefono=$_POST['telefono'];
}

if (isset($_POST['id'])) {
  $id_medico=$_POST['id'];
}
$lesion=new Medico();
if ($operacion=="1") {
  $bit->insert('Agrego una nuevo medico ', $_SESSION['id']);
  $lesion->insert($nombre, $apellido, $f_nacimiento, $f_inicio, $f_inicio, 1, $direccion,
  $telefono);
  $_SESSION['mensaje']="El médico se ha almacenado con éxito!";
}
elseif($operacion=="2") {
  $bit->insert('Edito al medico con codigo'.$id_medico, $_SESSION['id']);
  $lesion->update($id_medico, $nombre, $apellido, $f_nacimiento, $f_inicio, $f_inicio, 1, $direccion,
  $telefono);
  $_SESSION['mensaje']="El médico se ha modificado con éxito!";
} elseif ($operacion=="3") {
  $lesion->delete($id_medico);
  $_SESSION['mensaje']="El médico se ha eliminado con éxito!";
}
header('Location:index.php');
?>
