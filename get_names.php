<?php
session_start();

$class_id = $_GET['class_id'] ?? null;

if (!$class_id) {
    echo json_encode([]);
    exit();
}

$conn = new mysqli("localhost", "root", "", "slumpgrupp");

if ($conn->connect_error) {
    echo json_encode([]);
    exit();
}

$stmt = $conn->prepare("SELECT name FROM students WHERE class_id=? ORDER BY id ASC");
$stmt->bind_param("i", $class_id);
$stmt->execute();

$result = $stmt->get_result();

$names = [];

while ($row = $result->fetch_assoc()) {
    $names[] = $row["name"];
}

echo json_encode($names);