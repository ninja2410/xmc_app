<?php
require_once('..\..\Negocio/ClassPersonalTecnico.php');
if(isset($_POST['operation']))
{
  $operacion=$_POST['operation'];
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
        $lesion->insert(1, $key, $value);
      }
    }
}
elseif($operacion=="2") 
{
  
  $lesion->update($id_temporada,$descripcion, $fecha_inicio, $fecha_final);

}elseif ($operacion=="3") 
{
  $lesion->delete($id_temporada);
}
//header('Location:index.php');
?>
