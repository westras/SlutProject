<?php

$class_id = $_GET["class_id"] ?? "";

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "slumpgrupp"
);

if ($conn->connect_error) {
    echo json_encode([]);
    exit();
}

$stmt = $conn->prepare(
    "SELECT id, name
     FROM students
     WHERE class_id=?
     ORDER BY id ASC"
);

$stmt->bind_param("i", $class_id);
$stmt->execute();

$result = $stmt->get_result();

$names = [];

while ($row = $result->fetch_assoc()) {
    $names[] = $row;
}

header("Content-Type: application/json");
echo json_encode($names);

$stmt->close();
$conn->close();
?>