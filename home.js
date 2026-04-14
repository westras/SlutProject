document.addEventListener('DOMContentLoaded', function () {

    const params = new URLSearchParams(window.location.search);
    const classId = params.get("class_id");

    const enteredNamesDiv = document.querySelector('.enteredNames');
    const textarea = document.getElementById("NAMES");
    const generateBtn = document.getElementById("generateBtn");

    if (!enteredNamesDiv || !textarea || !generateBtn) return;

    // only load if class exists
    if (classId) {
        fetch('get_names.php?class_id=' + classId)
            .then(r => r.json())
            .then(names => {
                enteredNamesDiv.innerHTML = "";

                names.forEach(name => {
                    const div = document.createElement('div');
                    div.textContent = name;
                    enteredNamesDiv.appendChild(div);
                });
            })
            .catch(err => console.error(err));
    }

    textarea.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();

            const name = this.value.trim();
            if (!name || !classId) return;

            const div = document.createElement('div');
            div.textContent = name;
            enteredNamesDiv.appendChild(div);

            fetch('insert.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'name=' + encodeURIComponent(name) + '&class_id=' + classId
            });

            this.value = '';
        }
    });

    generateBtn.addEventListener("click", function () {

        const nameElements = document.querySelectorAll(".enteredNames div");
        let names = Array.from(nameElements).map(el => el.textContent);

        const groupCount = parseInt(document.getElementById("numberOfGroups").value);

        if (!groupCount || names.length === 0) return;

        names.sort(() => Math.random() - 0.5);

        let groups = Array.from({ length: groupCount }, () => []);

        names.forEach((name, i) => {
            groups[i % groupCount].push(name);
        });

        sessionStorage.setItem("groups", JSON.stringify(groups));

        window.location.href = "groups.php";
    });

});