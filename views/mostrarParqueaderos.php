<?php

require_once '../class/parqueaderos.php';

$datosParqueadero = Parqueadero::obtenerDatosParqueadero();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>
<body>    
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Cupos</th>
                    <th>Horario</th>
                    <th>Administrador</th>
                    <th>Acciones</th> <!-- Nueva columna para acciones -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosParqueadero as $item): ?>
                    <tr>
                        <td><?php echo $item['nombre_parqueadero']; ?></td>
                        <td><?php echo $item['ubicacion_parqueadero']; ?></td>
                        <td><?php echo $item['cupos_parqueadero']; ?></td>
                        <td><?php echo $item['horario_parqueadero']; ?></td>
                        <td><?php echo $item['nombre']; ?></td>
                        <td>
                            <!-- Botones de acciones -->
                            <button onclick="editarParqueadero(<?php echo $item['id']; ?>)">Editar</button>
                            <button id="btnEliminar" onclick="eliminarParqueadero(<?php echo $item['id']; ?>)">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <button class="btn" onclick="window.location.href='../pages/menuprincipal.html'">Inicio</button>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="../assets/scripts/datatable.js"></script>
    <script src="../assets/scripts/accionesParqueadero.js"></script>
</body>
</html>