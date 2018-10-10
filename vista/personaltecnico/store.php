<?php
require_once('..\..\Negocio/ClassPersonalTecnico.php');
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

}elseif ($operacion=="3") 
{
  $lesion->delete($id_temporada);
}
header('Location:/PJ_XJMC/vista/partido/index.php');
?>
