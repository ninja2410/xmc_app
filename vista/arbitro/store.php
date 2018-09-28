<?php
require_once('..\..\Negocio/ClassArbitro.php');
if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
echo json_encode($_POST);
if(isset($_POST['nombre'])){
  $nombre=$_POST['nombre'];
}

if (isset($_POST['apellidos'])) {
  $apellidos=$_POST['apellidos'];
}

if(isset($_POST['id_tipo_arbitro'])){
  $id_tipo_arbitro=$_POST['id_tipo_arbitro'];
}


if(isset($_POST['estado'])){
  $estado=$_POST['estado'];
}

if (isset($_POST['id'])) {
  $id_arbitro=$_POST['id'];
}


$accion=new Arbitro();
if ($operacion=="1") {
  $accion->insert($nombre,$apellidos, $id_tipo_arbitro);
}
elseif($operacion=="2") {
  $accion->update($id_arbitro, $nombre,$apellidos, $id_tipo_arbitro, $estado);
} elseif ($operacion=="3") {
  $accion->delete($id_arbitro);
}
header('Location:index.php');
?>
