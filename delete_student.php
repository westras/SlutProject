<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $student_id = $_POST["student_id"] ?? "";

    if (!$student_id) {
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
        "DELETE FROM students WHERE id=?"
    );

    $stmt->bind_param("i", $student_id);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}
?>