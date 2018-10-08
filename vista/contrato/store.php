<?php
require_once('..\..\Negocio/ClassContrato.php');

if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}

if(isset($_POST['fecha_inicio'])){
  $fecha_inicio = date("Y/m/d", strtotime($_POST['fecha_inicio']));
}

if(isset($_POST['fecha_final'])){
  $fecha_final = date("Y/m/d", strtotime($_POST['fecha_final']));
}

if(isset($_POST['id_documento_digital'])){
  $id_documento_digital=$_POST['id_documento_digital'];
}

if(isset($_POST['salario'])){
  $salario=$_POST['salario'];
}
if(isset($_POST['titulo'])){
  $titulo=$_POST['titulo'];
}

if (isset($_POST['id'])) {
  $id_contrato=$_POST['id'];
}
$accion=new Contrato();
if ($operacion=="1") {
  $accion->insert($fecha_inicio,$fecha_final,$salario,$titulo,$id_documento_digital);
}
elseif($operacion=="2") {
  $accion->update($id_contrato,$fecha_inicio,$fecha_final,$salario,$titulo,$id_documento_digital);
}
elseif ($operacion=="3") {
  $accion->delete($id_categoria);
}
 header('Location:index.php');
?>
