<?php
require_once('..\..\Conexion\conexion.php');
$conexion=new conexion();
$conexion->conectar();

$searchTerm = $_GET['term'];

$return_arr=array();

//get matched data from skills table
$query = $conexion->objetoconexion->query("SELECT id_medico, concat(nombre,' ' , apellido) nombre FROM MEDICO WHERE concat(nombre,' ' , apellido) LIKE '%".$searchTerm."%' ORDER BY nombre ASC");
while ($fila = $query->fetch_assoc())  {
    $ca_producto=array(
    "id"=> $fila['id_medico'],
    "value"=>$fila['nombre']
);
array_push($return_arr, $ca_producto);

}
//return json data
echo json_encode($return_arr);
?>
