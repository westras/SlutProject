<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Groups</title>

    <link rel="stylesheet" href="home.css">
</head>

<body>

<section class="navbar">

    <div class="titel">
        <img src="Pictures/GROUPGENERATORRRRR.png" alt="Logo">
    </div>

    <div class="nav-buttons">
        <button onclick="window.location.href='index.php'">Back</button>
    </div>

</section>

<section class="main">

    <div class="topmain" id="groupsContainer">

    </div>

</section>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const container = document.getElementById("groupsContainer");

    const groups = JSON.parse(sessionStorage.getItem("groups") || "[]");

    if (!groups.length) {
        container.innerHTML = "<div style='color:#000'>No groups generated</div>";
        return;
    }

    groups.forEach((group, index) => {

        const box = document.createElement("div");

        box.style.flex = "1";
        box.style.background = "#F4F7FA";
        box.style.border = "2px solid #000";
        box.style.borderRadius = "10px";
        box.style.padding = "10px";
        box.style.color = "#000";
        box.style.minWidth = "150px";

        const title = document.createElement("h3");
        title.textContent = "Group " + (index + 1);

        box.appendChild(title);

        group.forEach(name => {
            const div = document.createElement("div");
            div.textContent = name;
            box.appendChild(div);
        });

        container.appendChild(box);
    });

});
</script>

</body>
</html>