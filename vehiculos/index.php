<?php
include_once('../conec.php');

    $query = 'SELECT * FROM vehiculos';
    $insert = $conec->prepare($query);
    $insert->execute();
    $vehiculos = $insert->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehiculos</title>
    <script src="https://kit.fontawesome.com/5f09ee6d09.js" crossorigin="anonymous"></script>
</head>
<body>
    <ul>
        <li><a href="register.php">Nuevo</a></li>
    </ul>
    <table>
        <tr>
            <th>Modelo</th>
            <th>Placa</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($vehiculos as $vehiculo) { ?>
            <tr>
                <td><?php echo $vehiculo['modelo'] ?></td>
                <td><?php echo $vehiculo['placa'] ?></td>
                <td><a href="edit.php?id=<?php echo $vehiculo['id_vehiculo'] ?>"><i class="far fa-edit"></i></a>
                <a href="delete.php?id=<?php echo $vehiculo['id_vehiculo'] ?>"><i class="far fa-trash-alt"></i></a></td>
            </tr>
        <?php } ?> 
    </table>
</body>
</html>