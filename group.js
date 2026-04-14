
document.addEventListener("DOMContentLoaded", function () {

    const container = document.getElementById("groupsContainer");

    const groups = JSON.parse(sessionStorage.getItem("groups") || "[]");

    if (groups.length === 0) {
        container.innerHTML = "<p>No groups generated</p>";
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

        let html = `<h3>Group ${index + 1}</h3>`;

        group.forEach(name => {
            html += `<div>${name}</div>`;
        });

        box.innerHTML = html;
        container.appendChild(box);
    });

});
