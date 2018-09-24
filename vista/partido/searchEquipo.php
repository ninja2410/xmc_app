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
    
    $query = $db->query("SELECT * FROM equipo WHERE nombreusuario LIKE '%".$searchTerm."%' ORDER BY nombreusuario ASC");
}else 
{
    $query = $db->query("SELECT * FROM usuario ORDER BY nombreusuario ASC");
}

//get matched data from skills table

while ($row = $query->fetch_assoc()) {
    $data[] = $row['nombreusuario'];
}
//return json data
echo json_encode($data);
?>