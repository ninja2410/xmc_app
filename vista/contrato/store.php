<?php
require_once('../../Negocio/ClassContrato.php');
require_once('../../Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();

if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}

echo json_encode($_POST);

if(isset($_POST['fecha_inicio'])){
  $fecha_inicio=$_POST['fecha_inicio'];
}

if(isset($_POST['fecha_final'])){
  $fecha_final=$_POST['fecha_final'];
}


if(isset($_POST['estado'])){
  $estado=$_POST['estado'];
}

if(isset($_POST['salario'])){
  $salario=$_POST['salario'];
}

if(isset($_POST['titulo'])){
  $titulo=$_POST['titulo'];
}

if(isset($_POST['id_documento_digital'])){
  $id_documento_digital=$_POST['id_documento_digital'];
}


if (isset($_POST['id'])) {
  $id_contrato=$_POST['id'];
}

$accion=new Contrato();
if ($operacion=="1") {
  $bit->insert('Agrego un nuevo contrato', $_SESSION['id']);
  $accion->insert($fecha_inicio,$fecha_final,$salario,$titulo,$id_documento_digital);
}
elseif($operacion=="2") {
  $bit->insert('Modifico un contrato', $_SESSION['id']);
  $accion->update($id_contrato,$fecha_inicio,$fecha_final,$salario,$titulo,$id_documento_digital);

} elseif ($operacion=="3") {
  $bit->insert('Elimino un contrato', $_SESSION['id']);
  $accion->delete($id_contrato);
}
header('Location:index.php');
?>
