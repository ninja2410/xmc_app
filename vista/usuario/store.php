<?php
require_once('..\..\Negocio/ClassUsuario.php');
require_once('..\..\Negocio/ClassBitacora.php');
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
$bit=new Bitacora();
$cont=1;

if ($operacion=="1") 
{
  $lesion->insert($usuario, $pass);
  $bit->insert('Agrego un nuevo usuario', '1');

  foreach($_POST as $key => $value) 
  {
    if($cont<4)
    {
      $cont++;
      echo "POST parameter '$key' has '$value'".$cont;
    }
    else
    {
      echo "  '$key' = '$value'";
      
      
      if($value=='on')
      {
      $lesion->insertPermiso($key);
      }

    }
  }



}elseif($operacion=="2") 
{

  $lesion->update($id_usuario, $usuario, $pass);
  $bit->insert('Actualizo el usuario '.$id_usuario, '1');

  foreach($_POST as $key => $value) 
  {

    
    if($cont<4)
    {
      $cont++;
      echo "POST parameter '$key' has '$value'";
    }
    else
    {
      echo "  '$key' = '$value'";
      
      if($value=='on')
      {
      $lesion->updatePermiso($key);
      }

    }
  }
  


}elseif ($operacion=="3") 
{
  $lesion->delete($id_usuario);
}
//header('Location:index.php');
?>
