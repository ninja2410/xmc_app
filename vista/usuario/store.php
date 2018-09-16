<?php
require_once('..\..\Negocio/ClassUsuario.php');
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
  $lesion->insert($nombre, $apellido, $f_nacimiento, $f_inicio, $f_inicio, 1, $direccion,
  $telefono);
}
elseif($operacion=="2") {
  $lesion->update($id_medico, $nombre, $apellido, $f_nacimiento, $f_inicio, $f_inicio, 1, $direccion,
  $telefono);
} elseif ($operacion=="3") {
  $lesion->delete($id_medico);
}
header('Location:index.php');
?>
