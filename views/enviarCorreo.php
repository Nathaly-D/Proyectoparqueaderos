<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Formulario de Contacto</title>
</head>
<body>

<h1>Contacto</h1>
<form action="../controllers/enviarCorreo.php" method="post">

    <label for="correo">Correo electrónico:</label>
    <input type="email" id="correo" name="correo" required>
    <br>

    <label for="correo">Asunto:</label>
    <input type="text" id="asunto" name="asunto" required>
    <br>

    <label for="correo">Contenido:</label>
    <textarea id="contenido" name="contenido" rows="4" cols="50"></textarea>
    <br>

    <input type="submit" value="Enviar">
</form>

</body>
</html>
