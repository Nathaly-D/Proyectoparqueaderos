<?php
require_once '../class/parqueos.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $parqueo = Parqueo::obtenerPorId($id); // Debes implementar este método en tu clase

    if (!$parqueo) {
        echo "Parqueo no encontrado.";
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
    <title>Editar parqueo</title>
</head>
<body>
    <h1>Editar parqueo</h1>
    <form action="../controllers/insertarParqueos.php" method="post">
        <input type="hidden" name="id" value="<?php echo $parqueo['id']; ?>">

        <label for="tarifa">Tarifa:</label>
        <input type="text" name="tarifa" value="<?php echo $parqueo['tarifa']; ?>" required><br>

        <label for="hora">Hora:</label>
        <input type="time" name="hora" value="<?php echo $parqueo['hora']; ?>" required><br>
        
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" value="<?php echo $parqueo['fecha']; ?>" required><br>

        <label for="salida">Salida:</label>
        <input type="time" name="salida" value="<?php echo $parqueo['salida']; ?>" required><br>

        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>