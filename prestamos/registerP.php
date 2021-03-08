<?php
include_once('../conec.php');
    if($_POST){
        $vehiculo_id = $_POST['vehiculos'];
        $usuario_id = $_POST['usuarios'];
        $fecha = $_POST['fecha'];

        $query = 'INSERT INTO prestamos (vehiculo_id, usuario_id, fecha) VALUES (?,?,?)';
        $insert = $conec->prepare($query);
        $insert->execute(array($vehiculo_id, $usuario_id, $fecha));
        header('Location: index.php');
    }
?>