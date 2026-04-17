<?php
session_start();

$conn = new mysqli("localhost", "root", "", "slumpgrupp");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (!empty($username) && !empty($password)) {

        // Check if username exists
        $check = $conn->prepare(
            "SELECT id FROM users WHERE username=?"
        );

        $check->bind_param("s", $username);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {

            $error = "Username already exists";

        } else {

            $stmt = $conn->prepare(
                "INSERT INTO users (username, password)
                 VALUES (?, ?)"
            );

            $stmt->bind_param("ss", $username, $password);

            if ($stmt->execute()) {

                header("Location: login.php");
                exit();

            } else {

                $error = "Registration failed";

            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Create Account</title>

<link rel="stylesheet" href="home.css">

</head>

<body>

<section class="navbar">

<div class="titel">
<img src="Pictures/GROUPGENERATORRRRR.png">
</div>

</section>

<div class="form-center">

<div class="form-box">

<h2>Create Account</h2>

<?php
if (isset($error)) {
    echo "<p style='color:red;'>$error</p>";
}
?>

<form method="POST">

<input
type="text"
name="username"
placeholder="Username"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<button type="submit">
Register
</button>

</form>

<p class="link-text">

Already have an account?

<a href="login.php">
Login here
</a>

</p>

</div>

</div>

</body>

</html>