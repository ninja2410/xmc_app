<?php
require_once('..\..\Conexion\conexion.php');
$conexion=new conexion();
$conexion->conectar();

$searchTerm = $_GET['term'];

$return_arr=array();

//get matched data from skills table
$query = $conexion->objetoconexion->query("SELECT * FROM POSICION WHERE siglas LIKE '%".$searchTerm."%' ORDER BY siglas ASC");
while ($fila = $query->fetch_assoc()) 
{           $ca_producto=array(
    "id"=> $fila['id_posicion'],
    "value"=>$fila['siglas']
);
array_push($return_arr, $ca_producto);
   
}
//return json data
echo json_encode($return_arr);
?>
