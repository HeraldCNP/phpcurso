<?php
include_once('conectP.php');

#Conexión con la base de datos
$database = new Prestamo();
$conec= $database->db();


$us = 'SELECT * FROM users';
$sent = $conec->prepare($us);
$sent->execute();
$usuarios = $sent->fetchAll();
// var_dump($users);

$veh = 'SELECT * FROM vehiculos';
$sent = $conec->prepare($veh);
$sent->execute();
$vehiculos = $sent->fetchAll();
//var_dump($vehiculos);

//$prestamos = new Prestamo();
if (isset($_POST) && !empty($_POST)) {
    $vehiculo_id = $_POST['vehiculos'];
    $usuario_id = $_POST['usuarios'];
    $fecha = $_POST['fecha'];
    $res = $database->create($vehiculo_id, $usuario_id, $fecha);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <label for="modelo">Modelo</label>
        <br>
        <?php
        echo "<select ";
        foreach ($vehiculos as $vehiculo) {
            echo "name='vehiculos' id='vehiculo' >
                    <option value='" . $vehiculo['id_vehiculo'] . "'>" . $vehiculo['modelo'] . "</option>";
        }
        echo "</select>";


        ?>
        <br>
        <label for="email">Usuario</label> <br>
        <?php
        echo "<select ";
        foreach ($usuarios as $usuario) {
            echo "name='usuarios' id='usuario' >
                    <option value='" . $usuario['id'] . "'>" . $usuario['email'] . "</option>";
        }
        echo "</select>";


        ?>
        <br>
        <input type="date" name="fecha" id="fecha">
        <br>
        <input type="submit" value="Registrar">
    </form>
</body>

</html>