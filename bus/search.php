<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'bus';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM bus_details WHERE no_plate LIKE '%".$searchTerm."%' ORDER BY no_plate ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['no_plate'];
}
//return json data
echo json_encode($data);
?>
