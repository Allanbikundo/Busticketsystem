<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'bus';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from driver details table
$query = $db->query("SELECT * FROM driver_details WHERE driver_id LIKE '%".$searchTerm."%' ORDER BY driver_id ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['driver_id'];
}
//return json data
echo json_encode($data);
?>
