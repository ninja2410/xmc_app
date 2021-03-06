<?php
require_once('../../Negocio/ClassEquipo.php');
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
  $foto='ESC_'.$accion->correlativo().substr($name,-4);
  move_uploaded_file($_FILES['img']['tmp_name'],'../imagenes/equipos/'.$foto);
  chmod('../imagenes/equipos/'.$foto,0644);
  $accion->insert($nombre, $procedencia,$foto);
  $_SESSION['mensaje']="El equipo se ha almacenado con éxito!";
}

elseif($operacion=="2") {
  // $name=$_FILES['img']['name'];
  // $tmp='ESCUDO_'.$accion->correlativo().substr($name,-4);
  // move_uploaded_file($_FILES['img']['tmp_name'],'../imagenes/equipos/'.$tmp);
  // chmod('../imagenes/equipos/'.$tmp,0644);
  $foto=$_FILES['img']['name'];
  if ($foto=='') {
    $foto=$_POST['IMG'];
  }
  else{
     $name=$_FILES['img']['name'];
     $tmp='ESC_'.$accion->correlativo().substr($name,-4);
    move_uploaded_file($_FILES['img']['tmp_name'],'../imagenes/equipos/'.$tmp);
    chmod('../imagenes/equipos/'.$tmp,0644);
    $foto=$tmp;
  }
  $accion->update($id_equipo, $nombre, $procedencia, $foto);
  $_SESSION['mensaje']="El equipo se ha actualizado con éxito!";


} elseif ($operacion=="3") {
  $accion->delete($id_equipo);
  $_SESSION['mensaje']="El equipo se ha eliminado con éxito!";
}
header('Location:index.php');
?>
