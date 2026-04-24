function deleteClass(id) {

    if (!confirm("Delete this class and all students?")) return;

    fetch("delete_class.php?id=" + id)
        .then(() => location.reload());

}