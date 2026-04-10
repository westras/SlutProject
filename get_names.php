<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "slumpgrupp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode([]);
    exit();
}

$result = $conn->query("SELECT name FROM personer ORDER BY id ASC");
$names = [];

while ($row = $result->fetch_assoc()) {
    $names[] = $row['name'];
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($names);
?>