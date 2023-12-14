function editarParqueadero(id) {
    // Redirigir a la página de edición con el ID del parqueadero
    window.location.href = '../views/editarParqueaderos.php?id=' + id;
}

 function eliminarParqueadero(id) {
        if (confirm('¿Estás seguro de que quieres eliminar este parqueadero?')) {
            // Realizar petición AJAX para eliminar el parqueadero
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Redirigir a alguna página después de eliminar
                    window.location.href = '../views/mostrarParqueaderos.php';
                }
            };
            xhr.open('POST', '../controllers/eliminarParqueaderos.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('eliminar=true&id=' + id);
        }
    }