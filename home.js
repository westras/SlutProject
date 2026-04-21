document.addEventListener('DOMContentLoaded', function () {

    const params = new URLSearchParams(window.location.search);
    const classId = params.get("class_id");

    const enteredNamesDiv =
        document.querySelector('.enteredNames');

    const textarea =
        document.getElementById("NAMES");

    const generateBtn =
        document.getElementById("generateBtn");

    const groupInput =
        document.getElementById("numberOfGroups");

    if (!enteredNamesDiv || !textarea || !generateBtn) return;



    function createStudentElement(name, id) {

        const div =
            document.createElement('div');

        div.textContent = name;

        div.style.cursor = "pointer";

        div.dataset.id = id;



        div.addEventListener("click", function () {

            if (!confirm("Delete student " + name + "?"))
                return;

            fetch(
                "delete_student.php?id=" + id
            )
            .then(() => {

                div.remove();

            });

        });



        enteredNamesDiv.appendChild(div);

    }



    if (classId) {

        fetch(
            'get_names.php?class_id=' + classId
        )
        .then(r => r.json())
        .then(names => {

            enteredNamesDiv.innerHTML = "";

            names.forEach(student => {

                createStudentElement(
                    student.name,
                    student.id
                );

            });

        });

    }



    textarea.addEventListener(
        "keydown",
        function (event) {

            if (event.key === "Enter") {

                event.preventDefault();

                const name =
                    this.value.trim();

                if (!name || !classId) return;



                fetch('insert.php', {

                    method: 'POST',

                    headers: {
                        'Content-Type':
                        'application/x-www-form-urlencoded'
                    },

                    body:
                        'name=' +
                        encodeURIComponent(name) +
                        '&class_id=' +
                        classId

                })
                .then(r => r.json())
                .then(data => {

                    createStudentElement(
                        name,
                        data.id
                    );

                });



                this.value = '';

            }

        });



    groupInput.addEventListener(
        "input",
        function () {

            const count =
                document.querySelectorAll(
                    ".enteredNames div"
                ).length;

            if (this.value > count) {

                this.value = count;

            }

        });



    generateBtn.addEventListener(
        "click",
        function () {

            const nameElements =
                document.querySelectorAll(
                    ".enteredNames div"
                );

            let names =
                Array.from(nameElements)
                .map(el => el.textContent);



            let groupCount =
                parseInt(groupInput.value);



            if (!groupCount ||
                names.length === 0)
                return;



            if (groupCount > names.length) {

                groupCount = names.length;

            }



            names.sort(() =>
                Math.random() - 0.5
            );



            let groups =
                Array.from(
                    { length: groupCount },
                    () => []
                );



            names.forEach((name, i) => {

                groups[
                    i % groupCount
                ].push(name);

            });



            sessionStorage.setItem(
                "groups",
                JSON.stringify(groups)
            );



            window.location.href =
                "group.php";

        });

});