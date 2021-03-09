<?php
include_once('../conec.php');
    if ($_POST['id']) {
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];
        $id = $_POST['id'];

        $query = 'UPDATE vehiculos SET modelo=?, placa=? WHERE id_vehiculo=?';
        $update = $conec->prepare($query);
        $update->execute(array($modelo, $placa, $id));
        header('Location: index.php');
    }
?>