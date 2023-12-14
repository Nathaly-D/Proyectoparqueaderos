<!-- editarAdministrador.php -->
<?php
require_once '../class/administradores.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $administrador = Administrador::obtenerPorId($id); // Debes implementar este método en tu clase

    if (!$administrador) {
        echo "Administrador no encontrado.";
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
    <title>Editar Administrador</title>
</head>
<body>
    <h1>Editar Administrador</h1>
    <form action="../controllers/insertarAdministradores.php" method="post">
        <input type="hidden" name="id" value="<?php echo $administrador['id']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $administrador['nombre']; ?>" required><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" value="<?php echo $administrador['apellido']; ?>" required><br>

        <!-- Otros campos pueden agregarse según sea necesario -->

        <label for="clave">Clave:</label>
        <input type="password" name="clave" value="<?php echo $administrador['clave']; ?>" required><br>

        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
