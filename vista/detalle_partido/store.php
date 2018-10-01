<?php
require_once('..\..\Negocio/ClassDetallePartido.php');
if(isset($_POST['operation'])){
  $operacion=$_POST['operation'];
}
echo json_encode($_POST);
if(isset($_POST['fal'])){
  $fal=$_POST['fal'];
}

if(isset($_POST['esq'])){
  $esq=$_POST['esq'];
}

if(isset($_POST['asis'])){
  $asis=$_POST['asis'];
}

if(isset($_POST['tiros'])){
    $tiros=$_POST['tiros'];
  }

  if(isset($_POST['tiros_puerta'])){
    $tiros_puerta=$_POST['tiros_puerta'];
  }

  if(isset($_POST['ta'])){
    $ta=$_POST['ta'];
  }
  if(isset($_POST['tr'])){
    $tr=$_POST['tr'];
  }
  if(isset($_POST['fj'])){
    $fj=$_POST['fj'];
  }
  if(isset($_POST['cam'])){
    $cam=$_POST['cam'];
  }
  if(isset($_POST['gol'])){
    $gol=$_POST['gol'];
  }
  if(isset($_POST['exp'])){
    $exp=$_POST['exp'];
  }
  if(isset($_POST['equi'])){
    $equi=$_POST['equi'];
  }
  if(isset($_POST['partido'])){
    $partido=$_POST['partido'];
  }
  
if (isset($_POST['id'])) {
  $id_detalle_partido=$_POST['id'];
}

$accion=new Detalle();
if ($operacion=="1") 
{
  $accion->insert($esq,$fal, $asis, $tiros,$tiros_puerta,$ta,$tr,$fj,$cam,$gol,$exp,$equi,$partido);
}
elseif($operacion=="2") 
{
  $accion->update($id_detalle_partido, $esq,$fal, $asis, $tiros,$tiros_puerta,$ta,$tr,$fj,$cam,$gol,$exp,$equi,$partido);
} elseif ($operacion=="3") 
{
  $accion->delete($id_prensa);
}
header('Location:index.php?id='.$partido);
?>
