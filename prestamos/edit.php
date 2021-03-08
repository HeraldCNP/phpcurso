<?php
include_once('../conec.php');

if ($_GET['id']) {
    $id = $_GET['id'];

    $query = 'SELECT * FROM prestamos WHERE id_prestamo=?';
    $sent = $conec->prepare($query);
    $sent->execute(array($id));
    $prestamo = $sent->fetch();
}

$us = 'SELECT * FROM users';
$sent = $conec->prepare($us);
$sent->execute();
$usuarios = $sent->fetchAll();
// var_dump($users);

$veh = 'SELECT * FROM vehiculos';
$sent = $conec->prepare($veh);
$sent->execute();
$vehiculos = $sent->fetchAll();

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
    <form method="POST" action="editP.php">
        <label for="modelo">Modelo</label>
        <br>
        <?php
        echo "<select ";
        foreach ($vehiculos as $vehiculo) {
            if ($prestamo['vehiculo_id'] == $vehiculo['id_vehiculo']) {
                echo "name='vehiculos' id='vehiculo' >
                    <option selected value='" . $vehiculo['id_vehiculo'] . "'>" . $vehiculo['modelo'] . "</option>";
            } else {
                echo "name='vehiculos' id='vehiculo' >
                    <option value='" . $vehiculo['id_vehiculo'] . "'>" . $vehiculo['modelo'] . "</option>";
            }
        }
        echo "</select>";
        ?>
        <br>
        <label for="email">Usuario</label> <br>
        <?php
        echo "<select ";
        foreach ($usuarios as $usuario) {
            if ($prestamo['usuario_id'] == $usuario['id']) {
                echo "name='usuarios' id='usuario' >
                        <option selected value='" . $usuario['id'] . "'>" . $usuario['email'] . "</option>";
            } else {
                echo "name='usuarios' id='usuario' >
                        <option value='" . $usuario['id'] . "'>" . $usuario['email'] . "</option>";
            }
        }
        echo "</select>";


        ?>
        <br>
        <input type="date" name="fecha" id="fecha" value="<?php echo $prestamo['fecha'] ?>">
        <input type="hidden" name="id" id="id" value="<?php echo $prestamo['id_prestamo'] ?>">
        <br>
        <input type="submit" value="Registrar">
    </form>
</body>

</html>