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

$stmt = $conn->prepare("SELECT * FROM classes WHERE user_id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();

$classes = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
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
    max-width: 600px;
}

button {
    padding: 10px 15px;
    margin: 5px 0;
    cursor: pointer;
    border: 2px solid black;
    background: #2F6F95;
    color: white;
    border-radius: 5px;
}

button:hover {
    background: #245A78;
}

a {
    text-decoration: none;
}
</style>

</head>

<body>

<h1>Your Classes</h1>

<div class="box">

<?php while ($row = $classes->fetch_assoc()): ?>

    <a href="index.php?class_id=<?= $row['id'] ?>">
        <button><?= htmlspecialchars($row['class_name']) ?></button>
    </a>

<?php endwhile; ?>

<hr>

<h3>Create New Class</h3>

<form method="POST" action="create_class.php">
    <input type="text" name="class_name" placeholder="Class name" required>
    <button type="submit">Create Class</button>
</form>

<a href="logout.php">
    <button>Logout</button>
</a>
</div>

</body>
</html>