<?php
require_once('..\..\Negocio/ClassSocio.php');
if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
if(isset($_POST['name'])){
  $nombre=$_POST['name'];
}
if(isset($_POST['apellidos'])){
  $apellido=$_POST['apellidos'];
}
if(isset($_POST['domicilio'])){
  $dir_dom=$_POST['domicilio'];
}
if(isset($_POST['telefono'])){
  $telefono=$_POST['telefono'];
}
if(isset($_POST['fecha_nacimiento'])){
  $fnac=$_POST['fecha_nacimiento'];
}
if(isset($_POST['dpi'])){
  $dpi=$_POST['dpi'];
}
if(isset($_POST['dir_cobro'])){
  $dir_cob=$_POST['dir_cobro'];
}

if (isset($_POST['id'])) {
  $id_socio=$_POST['id'];
}
$beneficio=new Socio();
if ($operacion=="1") {
  $beneficio->insert($nombre, $apellido, $dir_dom, $telefono, $fnac, date('Y-m-d'), $dpi, $dir_cob);
}
elseif($operacion=="2") {
  $beneficio->update($id_socio, $nombre, $apellido, $dir_dom, $telefono, $fnac, date('Y-m-d'), $dpi, $dir_cob);
} elseif ($operacion=="3") {
  $beneficio->delete($id_socio);
}
header('Location:index.php');
?>
