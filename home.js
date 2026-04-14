document.addEventListener('DOMContentLoaded', function() {
    // Load existing names from database
    fetch('get_names.php')
        .then(response => response.json())
        .then(names => {
            const enteredNamesDiv = document.querySelector('.enteredNames');
            names.forEach(name => {
                const nameDiv = document.createElement('div');
                nameDiv.textContent = name;
                enteredNamesDiv.appendChild(nameDiv);
            });
        })
        .catch(error => {
            console.error('Error loading names:', error);
        });

    document.getElementById("NAMES").addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            const name = this.value.trim();
            if (name) {
                // Add to enteredNames
                const enteredNamesDiv = document.querySelector('.enteredNames');
                const nameDiv = document.createElement('div');
                nameDiv.textContent = name;
                enteredNamesDiv.appendChild(nameDiv);
                
                // Send to server
                fetch('insert.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'name=' + encodeURIComponent(name)
                })
                .then(response => response.text())
                .then(data => {
                    console.log('Saved:', data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
                
                // Clear the textarea
                this.value = '';
            }
        }
    });
    document.getElementById("generateBtn").addEventListener("click", function () {

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
});