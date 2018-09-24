<?php
require_once('..\..\Negocio/ClassEntrenador.php');
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

if(isset($_POST['fecha_nacimiento'])){
  $fecha_nacimiento = date("Y/m/d", strtotime($_POST['fecha_nacimiento']));
}

if(isset($_POST['fecha_inicio'])){
  $fecha_inicio = date("Y/m/d", strtotime($_POST['fecha_inicio']));
}

if(isset($_POST['fecha_fin'])){
  $fecha_fin = date("Y/m/d", strtotime($_POST['fecha_fin']));
}
if(isset($_POST['estado'])){
  $estado=$_POST['estado'];
}

if(isset($_POST['direccion'])){
  $direccion=$_POST['direccion'];
}

if(isset($_POST['telefono'])){
  $telefono=$_POST['telefono'];
}

if(isset($_POST['id_tipo_entrenador'])){
  $id_tipo_entrenador=$_POST['id_tipo_entrenador'];
}

if (isset($_POST['id'])) {
  $id_entrenador=$_POST['id'];
}
$accion=new Entrenador();
if ($operacion=="1") {
  $accion->insert($nombre, $apellido, $fecha_nacimiento, $fecha_inicio, $fecha_fin, $telefono,
  $direccion, $id_tipo_entrenador);
}
elseif($operacion=="2") {
  $accion->update($id_entrenador, $nombre, $apellido, $fecha_nacimiento, $fecha_inicio, $fecha_fin, $estado, $telefono,
  $direccion,$id_tipo_entrenador);
  
} elseif ($operacion=="3") {
  $accion->delete($id_entrenador);
}
header('Location:index.php');
?>
