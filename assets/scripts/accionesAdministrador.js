function editarAdministrador(id) {
    // Redirigir a la página de edición con el ID del administrador
    window.location.href = '../views/editarAdministradores.php?id=' + id;
}

 function eliminarAdministrador(id) {
        if (confirm('¿Estás seguro de que quieres eliminar este administrador?')) {
            // Realizar petición AJAX para eliminar el administrador
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Redirigir a alguna página después de eliminar
                    window.location.href = '../views/mostrarAdministradores.php';
                }
            };
            xhr.open('POST', '../controllers/eliminaradministradores.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('eliminar=true&id=' + id);
        }
    }
