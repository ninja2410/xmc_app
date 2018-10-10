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
  $name=$_FILES['img']['name'];
  $foto='ESCUDO_'.$accion->correlativo().substr($name,-4);
  move_uploaded_file($_FILES['img']['tmp_name'],'..\imagenes/'.$foto);
  chmod('..\imagenes/'.$foto,0644);
  $accion->insert($nombre, $procedencia,$foto);
}

elseif($operacion=="2") {
  $name=$_FILES['img']['name'];
  $tmp='ESCUDO_'.$accion->correlativo().substr($name,-4);
  move_uploaded_file($_FILES['img']['tmp_name'],'..\imagenes/'.$tmp);
  chmod('..\imagenes/'.$tmp,0644);
  $foto=$_FILES['img']['name'];
  if ($foto=='') {
    $foto=$_POST['foto'];
  }
  else{
    $foto=$tmp;
  }
  $accion->update($id_equipo, $nombre, $procedencia, $foto);
} elseif ($operacion=="3") {
  $accion->delete($id_equipo);
}
header('Location:index.php');
?>
