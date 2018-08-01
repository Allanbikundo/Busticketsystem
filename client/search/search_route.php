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
$query = $db->query("SELECT * FROM route WHERE route_name LIKE '%".$searchTerm."%' ORDER BY route_name ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['route_name'];
}
//return json data
echo json_encode($data);
?>
