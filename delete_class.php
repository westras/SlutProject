<?php

$conn = new mysqli("localhost", "root", "", "slumpgrupp");

if ($conn->connect_error) {
    http_response_code(500);
    exit();
}

$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

if ($id > 0) {

    // döda studenter först
    $stmt = $conn->prepare("DELETE FROM students WHERE class_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // och sedan klassen
    $stmt = $conn->prepare("DELETE FROM classes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    echo "deleted";
}

$conn->close();

?>