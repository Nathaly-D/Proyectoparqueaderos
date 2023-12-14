<?php
require_once '../class/reservas.php';
require_once '../class/vehiculos.php';

$vehiculos = Vehiculo::mostrar();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $reserva = Reserva::obtenerPorId($id); // Debes implementar este método en tu clase

    if (!$reserva) {
        echo "reserva no encontrado.";
        exit();
    }
} else {
    echo "Parámetros incorrectos.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
    <title>Editar reserva</title>
</head>
<body>
    <h1>Editar reserva</h1>
    <form action="../controllers/insertarReservas.php" method="post">
        <input type="hidden" name="id" value="<?php echo $reserva['id']; ?>">

        <label for="fecha">Fecha de Reserva:</label>
        <input type="date" name="fecha" value="<?php echo $reserva['fecha']; ?>" required><br>

        <label for="hora">Hora de Reserva:</label>
        <input type="time" name="hora" value="<?php echo $reserva['hora']; ?>" required><br>
        
        <label for="entrada">Entrada de Reserva:</label>
        <input type="time" name="entrada" value="<?php echo $reserva['entrada']; ?>" required><br>

        <label for="salida">Salida de Reserva:</label>
        <input type="time" name="salida" value="<?php echo $reserva['salida']; ?>" required><br>

        <label for="id_vehiculo">Vehiculo que Reserva:</label>
        <select id="id_vehiculo" name="id_vehiculo" required>
        <?php
        foreach ($vehiculos as $vehiculo) {
            echo "<option value='" . $vehiculo['id'] . "'>" . $vehiculo['placa'] . "</option>";
        }
        ?>
    </select><br>

        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>