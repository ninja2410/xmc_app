<?php
require_once('../../Negocio/ClassPersonalTecnico.php');
require_once('../../Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();

if(isset($_POST['operation']))
{
  $operacion=$_POST['operation'];
}

if(isset($_POST['id']))
{
  $id=$_POST['id'];
}

$lesion=new PersonalTecnico();
$cont=1;

if ($operacion=="1")
{
  $bit->insert('Edito el personal tecnico del partido'.$id,$_SESSION['id']);
  $_SESSION['mensaje']="El personal técnico se ha almacenado con éxito!";
    foreach($_POST as $key => $value)
    {
      if($cont==1)
      {
        $cont++;
        echo "POST parameter '$key' has '$value'";
      }
      else
      {
        echo "POST parameter '$key' has '$value'";
        $lesion->insert($id, $key, $value);
      }
    }
}
elseif($operacion=="2")
{
  $bit->insert('Edito el personal tecnico del partido'.$id,$_SESSION['id']);
  foreach($_POST as $key => $value)
  {
    if($cont==1)
    {
      $cont++;
      echo "POST parameter '$key' has '$value'";
    }
    else
    {

      echo "'$key' = '$value'";
      $lesion->update($key, $value);
    }

  }
  $_SESSION['mensaje']="El personal técnico se ha modificado con éxito!";

}elseif ($operacion=="3")
{
  $lesion->delete($id_temporada);
  $_SESSION['mensaje']="El personal técnico se ha eliminado con éxito!";
}
header('Location:../../partido/index.php');
?>
