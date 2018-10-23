<?php
require_once('..\..\Negocio/ClassEntrenador.php');
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

if(isset($_POST['nacionalidad'])){
  $nacionalidad=$_POST['nacionalidad'];
}


if (isset($_POST['id_contrato'])) {
  $id_contrato=$_POST['id_contrato'];
}

if (isset($_POST['id'])) {
  $id_entrenador=$_POST['id'];
}

$accion=new Entrenador();
if ($operacion=="1") {
$bit->insert('Se agrego un nuevo entredador', $_SESSION['id']);
  $name=$_FILES['img']['name'];
  $foto='ENTRENADOR_'.$accion->correlativo().substr($name,-4);
  move_uploaded_file($_FILES['img']['tmp_name'],'..\imagenes/'.$foto);
  chmod('..\imagenes/'.$foto,0644);
  $accion->insert($nombre, $apellido, $fecha_nacimiento, $fecha_inicio, $fecha_fin, $telefono,
  $direccion,$foto,$nacionalidad, $id_contrato);
}
elseif($operacion=="2") {
  $bit->insert('Modifico un entrenador', $_SESSION['id']);
  $name=$_FILES['img']['name'];
  $tmp='ENTRENADOR_'.$accion->correlativo().substr($name,-4);
  move_uploaded_file($_FILES['img']['tmp_name'],'..\imagenes/'.$tmp);
  chmod('..\imagenes/'.$tmp,0644);
  $foto=$_FILES['img']['name'];
  if ($foto=='') {
    $foto=$_POST['foto'];
  }
  else{
    $foto=$tmp;
  }
  $accion->update($id_entrenador, $nombre, $apellido, $fecha_nacimiento, $fecha_inicio, $fecha_fin,$telefono,
  $direccion,$foto,$nacionalidad, $id_contrato);
  
} elseif ($operacion=="3") {
  $bit->insert('Elimino un entrenador', $_SESSION['id']);
  $accion->delete($id_entrenador);
}
header('Location:index.php');
?>
