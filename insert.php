<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    if (!empty($name)) {
        // Database connection
        $servername = "localhost";
        $username = "root"; // Default XAMPP user
        $password = ""; // Default XAMPP password
        $dbname = "slumpgrupp";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            echo "Connection failed: " . $conn->connect_error;
            exit();
        }
        
        $stmt = $conn->prepare("INSERT INTO personer (name) VALUES (?)");
        $stmt->bind_param("s", $name);
        if ($stmt->execute()) {
            echo "Name saved successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
    } else {
        echo "No name provided";
    }
}
?>