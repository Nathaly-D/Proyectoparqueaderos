<?php

require_once '../class/vehiculos.php';
$datosVehiculo = Vehiculo::obtenerDatosVehiculo();
?>

<!DOCTYPE html>
<html lang="es"><head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../assets/css/styles.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>
<body>    
<table id="example" class="display" style="width:100%;">
    <thead>
    <tr>
        <th>Placa</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Altura</th>
        <th>Ancho</th>
        <th>Cliente</th>
        <th>Tipo de Vehiculo</th>
        <th>Acciones</th>

    </tr>
    </thead>
    <tbody>
        <tr>
        <?php
        foreach($datosVehiculo as $item): ?>
            <td> <?php echo $item['placa']; ?></td>
            <td> <?php echo $item['marca']; ?></td>
            <td> <?php echo $item['modelo']; ?></td>
            <td> <?php echo $item['altura']; ?></td>
            <td> <?php echo $item['ancho']; ?></td>
            <td> <?php echo $item['nombre']; ?></td>
            <td> <?php echo $item['vehiculoT']; ?></td>
            <td>                          
                <button class="btn" onclick="editarVehiculo(<?php echo $item['id']; ?>)">Editar</button>
                <button class="btn" id="btnEliminar" onclick="eliminarVehiculo(<?php echo $item['id']; ?>)">Eliminar</button>
            </td>
        </tr>
        <?php endforeach;
        ?>
    </tbody>
</table>

<button class="btn" onclick="window.location.href='../pages/menuprincipal.html'">Inicio</button>

</body>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="../assets/scripts/datatable.js"></script>
    <script src="../assets/scripts/accionesVehiculo.js"></script>
</html>