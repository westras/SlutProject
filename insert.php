<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'] ?? '';
    $class_id = $_POST['class_id'] ?? '';

    if (!$name || !$class_id) {
        exit();
    }

    $conn = new mysqli(
        "localhost",
        "root",
        "",
        "slumpgrupp"
    );

    if ($conn->connect_error) {
        exit();
    }

    $stmt = $conn->prepare(
        "INSERT INTO students (name, class_id)
         VALUES (?, ?)"
    );

    $stmt->bind_param(
        "si",
        $name,
        $class_id
    );

    $stmt->execute();

    echo $conn->insert_id;

    $stmt->close();
    $conn->close();
}
?>