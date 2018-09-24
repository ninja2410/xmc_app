<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'database';
$dbName = 'db_xelajumc';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM usuario WHERE nombreusuario LIKE '%".$searchTerm."%' ORDER BY nombreusuario ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['nombreusuario'];
}
//return json data
echo json_encode($data);
?>