<?php
require_once('..\..\Negocio/ClassBeneficio.php');
$nombre=$_POST['name'];
$estado=$_POST['status'];
$descripcion=$_POST['description'];
$beneficio=new Beneficio();
echo "string";
echo $beneficio->insert($descripcion, $estado, $nombre);
header('Location:insert.php');
?>
