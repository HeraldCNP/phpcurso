<?php
include_once('../conec.php');
    if ($_GET['id']) {
        $id = $_GET['id'];
        $query = 'SELECT * FROM vehiculos WHERE id_vehiculo=?';
        $edit = $conec->prepare($query);
        $edit->execute(array($id));
        $vehiculo = $edit->fetch();
        //var_dump($vehiculo);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar vehiculo</title>
</head>
<body>
    <form action="editV.php" method="post">
        <label for="modelo">Modelo</label>
        <input type="text" name="modelo" value="<?php echo $vehiculo['modelo'] ?>">
        <label for="placa">Placa</label>
        <input type="text" name="placa" value="<?php echo $vehiculo['placa'] ?>">
        <input type="hidden" name="id" value="<?php echo $vehiculo['id_vehiculo'] ?>">
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>