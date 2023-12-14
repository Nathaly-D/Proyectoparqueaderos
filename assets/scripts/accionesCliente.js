function editarCliente(id) {
    // Redirigir a la página de edición con el ID del cliente
    window.location.href = '../views/editarClientes.php?id=' + id;
}

 function eliminarCliente(id) {
        if (confirm('¿Estás seguro de que quieres eliminar este cliente?')) {
            // Realizar petición AJAX para eliminar el cliente
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Redirigir a alguna página después de eliminar
                    window.location.href = '../views/mostrarClientes.php';
                }
            };
            xhr.open('POST', '../controllers/eliminarClientes.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('eliminar=true&id=' + id);
        }
    }