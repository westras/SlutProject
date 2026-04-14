<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'] ?? '';
    $class_id = $_POST['class_id'] ?? null;

    if (!$name || !$class_id) {
        exit("Missing data");
    }

    $conn = new mysqli("localhost", "root", "", "slumpgrupp");

    if ($conn->connect_error) {
        exit("DB error");
    }

    $stmt = $conn->prepare("INSERT INTO students (class_id, name) VALUES (?, ?)");
    $stmt->bind_param("is", $class_id, $name);

    $stmt->execute();

    echo "ok";
}