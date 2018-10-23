<?php
require_once('..\..\Negocio/ClassJugador.php');
require_once('..\..\Negocio/ClassAsignacionCategoria.php');
require_once('..\..\Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();

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
if(isset($_POST['contrato'])){
  $id_contrato=$_POST['contrato'];
}
if (isset($_POST['id'])) {
  $id_jugador=$_POST['id'];
}
if (isset($_POST['id_AC'])) {
  $id_AC=$_POST['id_AC'];
}

if(isset($_POST['categoria'])){
  $id_categoria=$_POST['categoria'];
}
if(isset($_POST['fecha_inicio'])){
  $fecha_inicio = date("Y/m/d", strtotime($_POST['fecha_inicio']));
}
if(isset($_POST['fecha_final'])){
  $fecha_final = date("Y/m/d", strtotime($_POST['fecha_final']));
}

$jugador=new Jugador();
$asignacion_cat = new AsignacionCategoria();
if ($operacion=="1") {
  $bit->insert('Agrego un nuevo jugador', $_SESSION['id']);
  $id_jugador2=$jugador->correlativo();
  $id_equipo=1;
  $name=$_FILES['img']['name'];
  $foto='JUGADOR_'.$jugador->correlativo().substr($name,-4);
  move_uploaded_file($_FILES['img']['tmp_name'],'../imagenes/'.$foto);
  chmod('../imagenes/'.$foto,0644);
  $jugador->insert($nombre, $direccion, $fecha_nacimiento, $estado, $padre, $madre, $telefono, $procedencia, $apellidos, $foto, $id_posicion, $camisola,$id_contrato);
  $asignacion_cat->insert($fecha_inicio,$fecha_final,$id_categoria,$id_jugador2,$id_equipo);
  header('Location:index.php');
}
elseif($operacion=="2") {
  $bit->insert('Actualizo la informacion del jugador'.$id_jugador, $_SESSION['id']);
  $name=$_FILES['img']['name'];
  $tmp='JUGADOR_'.$jugador->correlativo().substr($name,-4);
  move_uploaded_file($_FILES['img']['tmp_name'],'../imagenes/'.$tmp);
  chmod('..\imagenes/'.$tmp,0644);
  $foto=$_FILES['img']['name'];
  if ($foto=='') {
    $foto=$_POST['foto'];
  }
  else{
    $foto=$tmp;
  }
  $id_equipo=1;
  $jugador->update($id_jugador, $nombre, $direccion, $fecha_nacimiento, $estado, $padre, $madre, $telefono, $procedencia, $apellidos, $foto, $id_posicion, $camisola,$id_contrato);
  $asignacion_cat->update($id_AC,$fecha_inicio,$fecha_final,$id_categoria,$id_jugador,$id_equipo);
  header('Location:detalle.php?id='.$id_jugador);
} elseif ($operacion=="3") {
  $jugador->delete($id_jugador);
  header('Location:index.php');
}
?>
