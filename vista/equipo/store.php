<?php
require_once('..\..\Negocio/ClassEquipo.php');
if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
echo json_encode($_POST);
if(isset($_POST['nombre'])){
  $nombre=$_POST['nombre'];
}

if(isset($_POST['procedencia'])){
  $procedencia=$_POST['procedencia'];
}


if(isset($_POST['estado'])){
  $estado=$_POST['estado'];
}

if (isset($_POST['id'])) {
  $id_equipo=$_POST['id'];
}
$accion=new Equipo();
if ($operacion=="1") {
  $accion->insert($nombre, $procedencia);
}
elseif($operacion=="2") {
  $accion->update($id_equipo, $nombre, $procedencia, $estado);
} elseif ($operacion=="3") {
  $accion->delete($id_equipo);
}
header('Location:index.php');
?>
