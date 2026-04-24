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

$stmt = $conn->prepare("SELECT id, class_name FROM classes WHERE user_id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();

$classes = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<link rel="stylesheet" href="dash.css" class="css">
<script src="dash.js" defer></script>

</head>

<body>

<h1>Your Classes</h1>

<div class="box">

<?php while ($row = $classes->fetch_assoc()) { ?>

    <div style="margin-bottom:10px;">

        <a href="index.php?class_id=<?= $row["id"] ?>">
            <button><?= htmlspecialchars($row["class_name"]) ?></button>
        </a>

        <button
            onclick="deleteClass(<?= $row["id"] ?>)"
            style="background:#c94b4b; margin-left:10px;">
            Delete
        </button>

    </div>

<?php } ?>

<h3>Create New Class</h3>

<form method="POST" action="create_class.php">

<input type="text" name="class_name" required>

<button type="submit">Create Class</button>
</form>
</div>
</body>
</html>