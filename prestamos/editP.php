<?php
include_once('../conec.php');
    if ($_POST) {
        $vehiculo_id = $_POST['vehiculos'];
        $usuario_id = $_POST['usuarios'];
        $fecha = $_POST['fecha'];
        $id = $_POST['id'];
        //var_dump($vehiculo_id, $usuario_id, $fecha);

        $query = "UPDATE prestamos 
        SET vehiculo_id=$vehiculo_id, usuario_id=$usuario_id, fecha='$fecha' WHERE id_prestamo=$id";
        $edit = $conec->prepare($query);
        $edit->execute(array($vehiculo_id, $usuario_id, $fecha, $id));
        header('Location: index.php');

    }
?>