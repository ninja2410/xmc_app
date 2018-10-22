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
  $dt_=$_POST['fecha_nacimiento'];
    $arr_=explode("/", $dt_);
    $fnac=$arr_[2].'-'. $arr_[1].'-'. $arr_[0];
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
if (isset($_POST['membresia'])) {
  $id_membresia=$_POST['membresia'];
}
if (isset($_POST['email'])) {
  $email=$_POST['email'];
}
$beneficio=new Socio();
if ($operacion=="1") {
  $name=$_FILES['img']['name'];
  $path='SOC_'.$beneficio->correlativo().substr($name,-4);
  move_uploaded_file($_FILES['img']['tmp_name'],'..\imagenes\sc/'.$path);
  chmod('..\imagenes\sc/'.$path,0644);
  $beneficio->insert($nombre, $apellido, $dir_dom, $telefono, $fnac, date('Y-m-d'), $dpi, $dir_cob, $id_membresia,
                      $email, $path);
}
elseif($operacion=="2") {
  $name=$_FILES['img']['name'];
  $tmp='SOC_'.$beneficio->correlativo().substr($name,-4);
  move_uploaded_file($_FILES['img']['tmp_name'],'..\imagenes\sc/'.$tmp);
  chmod('..\imagenes\sc/'.$tmp,0644);
  $path=$_FILES['img']['name'];
  if ($path=='') {
    $path=$_POST['foto'];
  }
  else{
    $path=$tmp;
  }
  $beneficio->update($id_socio, $nombre, $apellido, $dir_dom, $telefono, $fnac, date('Y-m-d'),
  $dpi, $dir_cob, $id_membresia, $email, $path);
} elseif ($operacion=="3") {
  $beneficio->delete($id_socio);
}
header('Location:index.php');
?>
