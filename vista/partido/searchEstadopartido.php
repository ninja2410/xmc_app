<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'database';
$dbName = 'db_xelajumc';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];

$return_arr=array();

//get matched data from skills table
$query = $db->query("SELECT * FROM estado_partido WHERE descripcion LIKE '%".$searchTerm."%' ORDER BY descripcion ASC");
while ($fila = $query->fetch_assoc()) 
{           $ca_producto=array(
    "id"=> $fila['id_estado_partido'],
    "value"=>$fila['descripcion']
);
array_push($return_arr, $ca_producto);
   
}
//return json data
echo json_encode($return_arr);
?>
