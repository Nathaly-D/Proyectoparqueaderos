const ct1x = document.getElementById('chart');

// Función para obtener la cantidad de vehículos desde el servidor
async function obtenerCantidadClientes() {
    try {
        const response = await fetch('../class/clientes.php');
        const data = await response.json();
        return data.cantidadClientes;
    } catch (error) {
        console.error('Error al obtener la cantidad de clientes:', error);
        return 0; // o manejar el error de otra manera
    }
}

// Función para actualizar el gráfico con los datos obtenidos
async function actualizarGrafico() {
    const cantidadClientes = await obtenerCantidadClientes();

    new Chart(ct1x, {
        type: 'doughnut',
        data: {
            labels: ['Clientes'],
            datasets: [{
                data: [cantidadClientes],
                backgroundColor: ['rgb(255, 99, 132)'],
                hoverOffset: 4
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

// Llamamos a la función para actualizar el gráfico al cargar la página
actualizarGrafico();
