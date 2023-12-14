<?php
require_once '../class/parqueos.php';
require_once '../class/reservas.php';  // Asegúrate de incluir el archivo con la definición de la clase Usuario

// Obtener la lista de clientes
$reservas = Reserva::mostrar();

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


<form action="../controllers/insertarParqueos.php" method="POST"><p class="value">Registro de parqueo</p>
    <label for="tarifa">Tarifa:</label><br>
    <input class="label" type="text" id="tarifa" name="tarifa" required><br>

    <label for="hora">Hora:</label><br>
    <input class="label" type="time" id="hora" name="hora" required><br>

    <label for="fecha">Fecha:</label><br>
    <input class="label" type="date" id="fecha" name="fecha" required><br>

    <label for="salida">Salida:</label><br>
    <input class="label" type="time" id="salida" name="salida" required><br>

    <label for="id_reserva">Reserva:</label><br>
    <select id="id_reserva" name="id_reserva" required>
        <?php
        foreach ($reservas as $reserva) {
            echo "<option value='" . $reserva['id'] . "'>" . $reserva['id'] . "</option>";
        }
        ?>
    </select><br>   

    <input class="btn" type="submit" value="Enviar">
    <button class="btn" onclick="window.location.href='../pages/menuprincipal.html'">Inicio</button>
</form>
</body>
</html>