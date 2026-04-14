<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "slumpgrupp");

$user_id = $_SESSION["user_id"];
$class_name = $_POST["class_name"];

$stmt = $conn->prepare(
"INSERT INTO classes (user_id, class_name)
 VALUES (?, ?)"
);

$stmt->bind_param("is", $user_id, $class_name);
$stmt->execute();

header("Location: dashboard.php");
exit();
?>