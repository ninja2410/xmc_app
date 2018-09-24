<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'database';
$dbName = 'db_xelajumc';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
if(isset($_GET['term']))
{
    $searchTerm = $_GET['term'];
    
    $query = $db->query("SELECT * FROM equipo WHERE nombre LIKE '%".$searchTerm."%' ORDER BY nombre ASC");
}else 
{
    $query = $db->query("SELECT * FROM equipo ORDER BY nombre ASC");
}

//get matched data from skills table

while ($row = $query->fetch_assoc()) {
    $data[] = $row['nombre'];
}
//return json data
echo json_encode($data);
?>