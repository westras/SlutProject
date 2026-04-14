<?php
session_start();

$conn = new mysqli("localhost", "root", "", "slumpgrupp");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare(
        "SELECT id, password FROM users WHERE username=?"
    );

    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {

        // TEMP password check (we hash later)
        if ($password == $row["password"]) {

            $_SESSION["user_id"] = $row["id"];

            header("Location: dashboard.php");
            exit();
        }
    }

    $error = "Wrong username or password";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="login.css" class="css">
</>

</head>

<body>

<div class="login-box">

<h2>Login</h2>

<?php
if (isset($error)) {
    echo "<p style='color:red;'>$error</p>";
}
?>

<form method="POST">

<input type="text"
       name="username"
       placeholder="Username"
       required>

<input type="password"
       name="password"
       placeholder="Password"
       required>

<button type="submit">
Login
</button>

</form>

</div>

</body>
</html>