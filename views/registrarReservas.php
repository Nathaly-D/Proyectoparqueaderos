<?php
require_once '../class/reservas.php';
require_once '../class/vehiculos.php';
require_once '../class/parqueaderos.php';  // Asegúrate de incluir el archivo con la definición de la clase Usuario

// Obtener la lista de clientes
$vehiculos = Vehiculo::mostrar();
$parqueaderos = Parqueadero::mostrar();

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
                <a class="navbar-brand" href="../index.html">ParkPath</a>
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
                            <a class="nav-link" href="./actualizadatos.html">Mi cuenta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.html">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
                
                
            </div>
        </nav>
    </div>


<form action="../controllers/insertarReservas.php" method="POST"><p class="value">Registra aquí tu reserva</p>
    <label for="fecha">Fecha del Parqueo:</label><br>
    <input class="label" type="date" id="fecha" name="fecha" required><br>

    <label for="hora">Hora de reserva:</label><br>
    <input class="label" type="time" id="hora" name="hora" required><br>

    <label for="entrada">Hora de entrada:</label><br>
    <input class="label" type="time" id="entrada" name="entrada" required><br>

    <label for="salida">Hora de salida:</label><br>
    <input class="label" type="time" id="salida" name="salida" required><br>

    <label for="id_vehiculo">Vehiculo que Reserva:</label><br>
    <select id="id_vehiculo" name="id_vehiculo" required>
        <?php
        foreach ($vehiculos as $vehiculo) {
            echo "<option value='" . $vehiculo['id'] . "'>" . $vehiculo['placa'] . "</option>";
        }
        ?>
    </select><br>

    <label for="id_parqueadero">Parqueadero donde se reserva:</label><br>
    <select id="id_parqueadero" name="id_parqueadero" required>
        <?php
        foreach ($parqueaderos as $parqueadero) {
            echo "<option value='" . $parqueadero['id'] . "'>" . $parqueadero['nombre_parqueadero'] . "</option>";
        }
        ?>
    </select><br>

    <input class="btn" type="submit" value="Enviar">
    <button class="btn" onclick="window.location.href='../pages/menuprincipal.html'">Inicio</button>
</form>
</body>
</html>