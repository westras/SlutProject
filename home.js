document.addEventListener("DOMContentLoaded", function () {

    const input = document.getElementById("NAMES");
    const enteredNamesDiv = document.querySelector(".enteredNames");
    const generateBtn = document.getElementById("generateBtn");

    if (!input || !enteredNamesDiv) {
        console.error("Missing required DOM elements");
        return;
    }

    // Load existing names from database
    fetch("get_names.php")
        .then(response => response.json())
        .then(names => {

            if (!Array.isArray(names)) return;

            names.forEach(name => {
                const div = document.createElement("div");
                div.textContent = name;
                enteredNamesDiv.appendChild(div);
            });

        })
        .catch(err => {
            console.error("get_names.php failed:", err);
        });

    // Add names on Enter
    input.addEventListener("keydown", function (event) {

        if (event.key !== "Enter") return;

        event.preventDefault();

        const name = this.value.trim();
        if (!name) return;

        const div = document.createElement("div");
        div.textContent = name;
        enteredNamesDiv.appendChild(div);

        fetch("insert.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "name=" + encodeURIComponent(name)
        })
        .then(res => res.text())
        .then(data => console.log("Saved:", data))
        .catch(err => console.error("insert.php failed:", err));

        this.value = "";
    });

    // Generate groups
    if (generateBtn) {

        generateBtn.addEventListener("click", function () {

            const nameElements = document.querySelectorAll(".enteredNames div");
            let names = Array.from(nameElements).map(el => el.textContent);

            const groupCount = parseInt(document.getElementById("numberOfGroups").value);

            if (!groupCount || names.length === 0) return;

            names.sort(() => Math.random() - 0.5);

            let groups = Array.from({ length: groupCount }, () => []);

            names.forEach((name, index) => {
                groups[index % groupCount].push(name);
            });

            sessionStorage.setItem("groups", JSON.stringify(groups));

            window.location.href = "groups.php";
        });

    }

});