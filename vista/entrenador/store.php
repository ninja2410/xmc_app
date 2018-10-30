<?php
require_once('..\..\Negocio/ClassEntrenador.php');
require_once('..\..\Negocio/ClassAsignacionEntrenador.php');
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

// if(isset($_POST['fecha_nacimiento'])){
//   $dt_=$_POST['fecha_nacimiento'];
//     $arr_=explode("/", $dt_);
//     $fecha=$arr_[2].'-'. $arr_[1].'-'. $arr_[0];
// }

if(isset($_POST['fecha_nacimiento'])){
  $fecha_nacimiento = date("Y/m/d", strtotime($_POST['fecha_nacimiento']));
}

// if(isset($_POST['fecha_inicio'])){
//   $dt_=$_POST['fecha_inicio'];
//     $arr_=explode("/", $dt_);
//     $fecha=$arr_[2].'-'. $arr_[1].'-'. $arr_[0];
// }

// if(isset($_POST['fecha_fin'])){
//   $dt_=$_POST['fecha_fin'];
//     $arr_=explode("/", $dt_);
//     $fecha=$arr_[2].'-'. $arr_[1].'-'. $arr_[0];
// }

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


// if (isset($_POST['id_contrato'])) {
//   $id_contrato=$_POST['id_contrato'];
// }

if (isset($_POST['id'])) {
  $id_entrenador=$_POST['id'];
}

if(isset($_POST['categoria'])){
  $id_categoria=$_POST['categoria'];
}

if (isset($_POST['id_AE'])) {
  $id_AE=$_POST['id_AE'];
}

$accion=new Entrenador();
$asignacion = new AsignacionEntrenador();
if ($operacion=="1") {
$bit->insert('Se agrego un nuevo entrenador', $_SESSION['id']);
$id_entrenador2=$accion->correlativo();
  $name=$_FILES['img']['name'];
  $foto='ENTRENADOR_'.$accion->correlativo().substr($name,-4);
  move_uploaded_file($_FILES['img']['tmp_name'],'..\imagenes/entrenadores/'.$foto);
  chmod('..\imagenes/entrenadores/'.$foto,0644);
  $accion->insert($nombre, $apellido, $fecha_nacimiento, $fecha_inicio, $fecha_fin, $telefono,
  $direccion,$foto,$nacionalidad);
  $asignacion->insert($id_categoria,$id_entrenador2);
  $_SESSION['mensaje']="El entrenador se ha almacenado con éxito!";
}
elseif($operacion=="2") {
  $bit->insert('Modifico un entrenador', $_SESSION['id']);
  $name=$_FILES['img']['name'];
  $tmp='ENTRENADOR_'.$accion->correlativo().substr($name,-4);
  move_uploaded_file($_FILES['img']['tmp_name'],'..\imagenes/entrenadores/'.$tmp);
  chmod('..\imagenes/entrenadores/'.$tmp,0644);
  $foto=$_FILES['img']['name'];
  if ($foto=='') {
    $foto=$_POST['foto'];
  }
  else{
    $foto=$tmp;
  }
  $accion->update($id_entrenador, $nombre, $apellido, $fecha_nacimiento, $fecha_inicio, $fecha_fin,$telefono,
  $direccion,$foto,$nacionalidad);
  $asignacion->update($id_AE,$id_categoria,$id_entrenador);
  $_SESSION['mensaje']="El entrenador se ha actualizado con éxito!";

} elseif ($operacion=="3") {
  $bit->insert('Eliminó un entrenador', $_SESSION['id']);
  $accion->delete($id_entrenador);
  $_SESSION['mensaje']="El entrenador se ha eliminado con éxito!";
}
header('Location:index.php');
?>
