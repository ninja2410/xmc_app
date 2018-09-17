<?php
require_once('..\..\Negocio/ClassPrensa.php');
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

  if(isset($_POST['estado'])){
    $empresa=$_POST['estado'];
  }

if (isset($_POST['id'])) {
  $id_prensa=$_POST['id'];
}
$accion=new Prensa();
if ($operacion=="1") {
  $accion->insert($nombre, $apellido, $telefono, $empresa);
}
elseif($operacion=="2") {
  $accion->update($id_prensa, $nombre, $apellido, $telefono, $empresa, $estado);
} elseif ($operacion=="3") {
  $accion->delete($id_prensa);
}
header('Location:index.php');
?>
