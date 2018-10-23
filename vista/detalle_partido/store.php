<?php
require_once('..\..\Negocio/ClassDetallePartido.php');
require_once('..\..\Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();

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

//---------------------------------------
if(isset($_POST['fal2'])){
  $fal2=$_POST['fal2'];
}

if(isset($_POST['esq2'])){
  $esq2=$_POST['esq2'];
}

if(isset($_POST['asis2'])){
  $asis2=$_POST['asis2'];
}

if(isset($_POST['tiros2'])){
    $tiros2=$_POST['tiros2'];
  }

  if(isset($_POST['tiros_puerta2'])){
    $tiros_puerta2=$_POST['tiros_puerta2'];
  }

  if(isset($_POST['ta2'])){
    $ta2=$_POST['ta2'];
  }
  if(isset($_POST['tr2'])){
    $tr2=$_POST['tr2'];
  }
  if(isset($_POST['fj2'])){
    $fj2=$_POST['fj2'];
  }
  if(isset($_POST['cam2'])){
    $cam2=$_POST['cam2'];
  }
  if(isset($_POST['gol2'])){
    $gol2=$_POST['gol2'];
  }
  if(isset($_POST['exp2'])){
    $exp2=$_POST['exp2'];
  }

if (isset($_POST['id2'])) {
  $id_detalle_partido2=$_POST['id2'];
}
//-------------------------------------------------
$accion=new Detalle();
if ($operacion=="1")
{
  $accion->insert($esq,$fal, $asis, $tiros,$tiros_puerta,$ta,$tr,$fj,$cam,$gol,$exp,$equi,$partido);
  $_SESSION['mensaje']="Las información se ha almacenado con éxito!";
}
elseif($operacion=="2")
{
  $bit->insert('Se modificaron los resultados del partido'.$partido, $_SESSION['id']);
  $accion->update($id_detalle_partido, $esq,$fal, $asis, $tiros,$tiros_puerta,$ta,$tr,$fj,$cam,$gol,$exp,1,$partido);
  $accion->update($id_detalle_partido2, $esq2,$fal2, $asis2, $tiros2,$tiros_puerta2,$ta2,$tr2,$fj2,$cam2,$gol2,$exp2,$equi,$partido);
$_SESSION['mensaje']="Las información se ha modificado con éxito!";
} elseif ($operacion=="3")
{
  $bit->insert('Se elimino los resultados del partido', $_SESSION['id']);
  $accion->delete($id_prensa);
  $_SESSION['mensaje']="Las información se ha eliminado con éxito!";
}
header('Location:index.php?id='.$partido.'&id2='.$equi);
?>
