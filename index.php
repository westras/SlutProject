<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Generator</title>

    <link rel="stylesheet" href="home.css">
    <script src="home.js" defer></script>
</head>

<body>

<section class="navbar">

    <div class="titel">
        <img src="Pictures/GROUPGENERATORRRRR.png" alt="Logo">
    </div>

    <div class="nav-buttons">

        <?php if (!isset($_SESSION["user_id"])): ?>
            <a href="login.php">
                <button>Login</button>
            </a>
        <?php else: ?>
            <a href="dashboard.php">
                <button>My Classes</button>
            </a>

            <a href="logout.php">
                <button>Logout</button>
            </a>
        <?php endif; ?>

    </div>

</section>

<section class="main">

    <div class="topmain">

        <div class="lefttopmain">

            <textarea placeholder="Students..." id="NAMES"></textarea>

            <input type="number" id="numberOfGroups" min="1" max="100">

            <button id="generateBtn">Generate Groups</button>

        </div>

        <div class="righttopmain">

            <div class="enteredNames"></div>

        </div>

    </div>

</section>

</body>
</html>