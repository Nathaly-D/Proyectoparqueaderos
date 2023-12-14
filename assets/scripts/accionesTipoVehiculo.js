function editarTipoVehiculo(id) {
    // Redirigir a la página de edición con el ID del cliente
    window.location.href = '../views/editarTipoVehiculos.php?id=' + id;
}

 function eliminarTipoVehiculo(id) {
        if (confirm('¿Estás seguro de que quieres eliminar este cliente?')) {
            // Realizar petición AJAX para eliminar el cliente
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Redirigir a alguna página después de eliminar
                    window.location.href = '../views/mostrarTipoVehiculos.php';
                }
            };
            xhr.open('POST', '../controllers/eliminarTipoVehiculos.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('eliminar=true&id=' + id);
        }
    }