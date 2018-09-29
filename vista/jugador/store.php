<?php
require_once('..\..\Negocio/ClassJugador.php');
if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
if(isset($_POST['nombre'])){
  $nombre=$_POST['nombre'];
}
if(isset($_POST['apellidos'])){
  $apellidos=$_POST['apellidos'];
}
if(isset($_POST['direccion'])){
  $direccion=$_POST['direccion'];
}
echo json_encode($_POST);
if(isset($_POST['fecha_nacimiento'])){
  $fecha_nacimiento = date("Y/m/d", strtotime($_POST['fecha_nacimiento']));
}
if(isset($_POST['telefono'])){
  $telefono=$_POST['telefono'];
}
if(isset($_POST['status'])){
  if($_POST['status']=="on" || $_POST['status']=="1"){
    $estado=1;
  }
  else{
    $estado=0;
  }
}
if(isset($_POST['padre'])){
    $padre=$_POST['padre'];
  }
  if(isset($_POST['madre'])){
    $madre=$_POST['madre'];
  }
  if(isset($_POST['procedencia'])){
    $procedencia=$_POST['procedencia'];
  }
if (isset($_POST['id'])) {
  $id_jugador=$_POST['id'];
}
$jugador=new Jugador();
$foto='nada';
if ($operacion=="1") {
  $jugador->insert($nombre, $direccion, $fecha_nacimiento, $estado, $padre, $madre, $telefono, $procedencia, $apellidos, $foto);
}
elseif($operacion=="2") {
  $jugador->update($id_jugador, $nombre, $direccion, $fecha_nacimiento, $estado, $padre, $madre, $telefono, $procedencia, $apellidos, $foto);
  header('Location:detalle.php?id='.$id_jugador);
} elseif ($operacion=="3") {
  $jugador->delete($id_jugador);
  header('Location:index.php');
}
?>
