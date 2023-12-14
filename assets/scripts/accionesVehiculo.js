function editarVehiculo(id) {
    // Redirigir a la página de edición con el ID del Vehiculo
    window.location.href = '../views/editarVehiculos.php?id=' + id;
}

 function eliminarVehiculo(id) {
        if (confirm('¿Estás seguro de que quieres eliminar este Vehiculo?')) {
            // Realizar petición AJAX para eliminar el Vehiculo
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Redirigir a alguna página después de eliminar
                    window.location.href = '../views/mostrarVehiculos.php';
                }
            };
            xhr.open('POST', '../controllers/eliminarVehiculos.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('eliminar=true&id=' + id);
        }
    }
