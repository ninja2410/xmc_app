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
if(isset($_POST['fecha_nacimiento'])){
  $fecha_nacimiento = date("Y/m/d", strtotime($_POST['fecha_nacimiento']));
}
if(isset($_POST['telefono'])){
  $telefono=$_POST['telefono'];
}
$estado=1;
if(isset($_POST['padre'])){
    $padre=$_POST['padre'];
}
if(isset($_POST['madre'])){
  $madre=$_POST['madre'];
}
if(isset($_POST['procedencia'])){
  $procedencia=$_POST['procedencia'];
}
if(isset($_POST['posicion'])){
  $id_posicion=$_POST['posicion'];
}
if(isset($_POST['camisola'])){
  $camisola=$_POST['camisola'];
}
if (isset($_POST['id'])) {
  $id_jugador=$_POST['id'];
}
$jugador=new Jugador();

$id_contrato=1;

if ($operacion=="1") {
  $name=$_FILES['img']['name'];
  $foto='JUGADOR_'.$jugador->correlativo().substr($name,-4);
  move_uploaded_file($_FILES['img']['tmp_name'],'../imagenes/'.$foto);
  chmod('../imagenes/'.$foto,0644);
  $jugador->insert($nombre, $direccion, $fecha_nacimiento, $estado, $padre, $madre, $telefono, $procedencia, $apellidos, $foto, $id_posicion, $camisola,$id_contrato);
  echo('Se inserto correctamente');
  // header('Location:index.php');
}
elseif($operacion=="2") {
  $jugador->update($id_jugador, $nombre, $direccion, $fecha_nacimiento, $estado, $padre, $madre, $telefono, $procedencia, $apellidos, $foto, $id_posicion, $camisola,$id_contrato);
  header('Location:detalle.php?id='.$id_jugador);
} elseif ($operacion=="3") {
  $jugador->delete($id_jugador);
  header('Location:index.php');
}
?>
