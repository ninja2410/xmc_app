<?php
require_once('../../Conexion/conexion.php');
$conexion=new conexion();
$conexion->conectar();

$searchTerm = $_POST['id_me'];

$return_arr=array();

//get matched data from skills table
$query = $conexion->objetoconexion->query("SELECT * FROM ASIGNACION_BENEFICIO WHERE id_membresia = $searchTerm");
while ($fila = $query->fetch_assoc()) 
{           $ca_producto=array(
    "id"=> $fila['id_beneficio'],
    "value"=>$fila['id_membresia'],
    
);
array_push($return_arr, $ca_producto);
   
}
//return json data
echo json_encode($return_arr);
?>
