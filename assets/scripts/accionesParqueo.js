function editarParqueo(id) {
    // Redirigir a la página de edición con el ID del Parqueo
    window.location.href = '../views/editarParqueos.php?id=' + id;
}

 function eliminarParqueo(id) {
        if (confirm('¿Estás seguro de que quieres eliminar este Parqueo?')) {
            // Realizar petición AJAX para eliminar el Parqueo
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Redirigir a alguna página después de eliminar
                    window.location.href = '../views/mostrarParqueos.php';
                }
            };
            xhr.open('POST', '../controllers/eliminarParqueos.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('eliminar=true&id=' + id);
        }
    }