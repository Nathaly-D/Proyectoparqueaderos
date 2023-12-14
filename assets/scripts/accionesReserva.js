function editarReserva(id) {
    // Redirigir a la página de edición con el ID del Reserva
    window.location.href = '../views/editarReservas.php?id=' + id;
}

 function eliminarReserva(id) {
        if (confirm('¿Estás seguro de que quieres eliminar este Reserva?')) {
            // Realizar petición AJAX para eliminar el Reserva
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Redirigir a alguna página después de eliminar
                    window.location.href = '../views/mostrarReservas.php';
                }
            };
            xhr.open('POST', '../controllers/eliminarReservas.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('eliminar=true&id=' + id);
        }
    }