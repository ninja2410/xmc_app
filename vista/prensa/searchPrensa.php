<?php
require_once('../../Conexion/conexion.php');
$conexion=new conexion();
$conexion->conectar();

$searchTerm = $_GET['term'];

$return_arr=array();

//get matched data from skills table
$query = $conexion->objetoconexion->query("SELECT id_prensa, CONCAT(nombre,concat(' ',apellido)) as nombre FROM PRENSA WHERE CONCAT(nombre,concat(' ',apellido)) LIKE '%".$searchTerm."%' and estado=1 ORDER BY nombre ASC");
while ($fila = $query->fetch_assoc()) 
{           $ca_producto=array(
    "id"=> $fila['id_prensa'],
    "value"=>$fila['nombre']
);
array_push($return_arr, $ca_producto);
   
}
//return json data
echo json_encode($return_arr);
?>
