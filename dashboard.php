<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "slumpgrupp");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION["user_id"];

$result = $conn->prepare(
    "SELECT * FROM classes WHERE user_id=?"
);

$result->bind_param("i", $user_id);
$result->execute();

$classes = $result->get_result();
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<style>

body {
    font-family: Arial;
    background-color: #1F3E57;
    color: white;
    padding: 20px;
}

.box {
    background: #E6EDF2;
    color: black;
    padding: 20px;
    border-radius: 15px;
    border: 2px solid black;
}

button {
    padding: 10px;
    margin-top: 10px;
}

</style>

</head>

<body>

<h1>Your Classes</h1>

<div class="box">

<?php
while ($row = $classes->fetch_assoc()) {
    echo "<p>" . $row["class_name"] . "</p>";
}
?>

<h3>Create New Class</h3>

<form method="POST" action="create_class.php">

<input type="text"
       name="class_name"
       placeholder="Class name"
       required>

<button type="submit">
Create Class
</button>

</form>

</div>

</body>
</html>