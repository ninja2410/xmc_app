<?php
require_once('../../Conexion/conexion.php');
$conexion=new conexion();
$conexion->conectar();

$searchTerm = $_GET['term'];

$return_arr=array();



//get matched data from skills table
$query = $conexion->objetoconexion->query("SELECT * FROM CATEGORIA WHERE nombre LIKE '%".$searchTerm."%' ORDER BY nombre ASC");
$result = mysqli_num_rows($query);
if($result>0)
{
while ($fila = $query->fetch_assoc()) 
{           $ca_producto=array(
    "id"=> $fila['id_categoria'],
    "value"=>$fila['nombre']
);
array_push($return_arr, $ca_producto);
   
}
echo json_encode($return_arr);
}else
{         
    $ca_producto=array(
    "id"=>'0',
    "value"=>'No hay resultado');
    array_push($return_arr, $ca_producto);
echo json_encode($return_arr);
}
?>