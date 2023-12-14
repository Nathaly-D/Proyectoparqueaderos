<?php
require_once '../class/clientes.php';
require_once '../class/tipoVehiculos.php';  // Asegúrate de incluir el archivo con la definición de la clase Usuario

// Obtener la lista de clientes
$clientes = Cliente::mostrar();
$vehiculosT = Tipo::mostrar();

?>
<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario de Registro</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/styles.css">
    </head>
    <body>
     <!------------------------------Nav Bar ----------------------------------->  
     <div class="Navbar">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="marca">
                    <img src="../assets/dist/img/logo.jfif" class="Logo" alt="Logo ParkPath">
                </div>   
                <a class="navbar-brand" href="">ParkPath</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../views/registrarVehiculos.php">Registrar vehiculos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../views/mostrarVehiculos.php">Consultar vehiculos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../views/mostrarParqueaderos.php">Consultar parqueaderos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../views/registrarReservas.php">Reserva</a>
                        </li>
                    </ul>
                </div>
                
                <!-- Contenedor para los elementos separados -->
                <div class="d-flex">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../views/mostrarClientes.php">Mi cuenta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.html">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
                
                
            </div>
        </nav>
    </div>
    <!--------------------------------------------------------Formulario------------------->


        <form action="../controllers/insertarVehiculos.php" method="POST"><p class="value">Registra aquí tu vehiculo</p><br>
            <label for="placa">Placa:</label><br>
            <input class="label" type="text" id="placa" name="placa" required><br>

            <label for="marca">Marca:</label><br>
            <input class="label" type="text" id="marca" name="marca" required><br>

            <label for="modelo">Modelo:</label><br>
            <input class="label" type="text" id="modelo" name="modelo" required><br>

            <label for="altura">Altura:</label><br>
            <input class="label" type="text" id="altura" name="altura" required><br>
<br>
            <label for="ancho">Ancho:</label><br>
            <input class="label" type="text" id="ancho" name="ancho" required><br>

            <label for="id_cliente">Cliente:</label><br>
            <select id="id_cliente" name="id_cliente" required>
                <?php
                foreach ($clientes as $cliente) {
                    echo "<option value='" . $cliente['id'] . "'>" . $cliente['nombre'] . "</option>";
                }
                ?>
            </select><br>

            <label for="id_tipoVehiculo">Tipo de Vehiculo:</label><br>
            <select id="id_tipoVehiculo" name="id_tipoVehiculo" required>
                <?php
                foreach ($vehiculosT as $vehiculoT) {
                    echo "<option value='" . $vehiculoT['id'] . "'>" . $vehiculoT['vehiculoT'] . "</option>";
                }
                ?>
            </select><br>
            

            <input class="btn" type="submit" value="Enviar">
            <button class="btn" onclick="window.location.href='../pages/menuprincipal.html'">Inicio</button>

        </form>
    </body>
</html><!---------------NO AAGRRA EL CSS---------------->