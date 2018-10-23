<?php
require_once('..\..\Negocio/ClassUsuario.php');


if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
echo json_encode($_POST);
if(isset($_POST['usuario'])){
  $usuario=$_POST['usuario'];
}

if(isset($_POST['pass'])){
  $pass=$_POST['pass'];
}

if (isset($_POST['id'])) {
  $id_usuario=$_POST['id'];
}

$lesion=new Usuario();
if ($operacion=="1") 
{
  
  $lesion->insert($usuario, $pass);

}elseif($operacion=="2") 
{
  
  $lesion->update($id_usuario, $usuario, $pass);

}elseif ($operacion=="3") 
{
  $lesion->delete($id_usuario);
}
header('Location:index.php');
?>
