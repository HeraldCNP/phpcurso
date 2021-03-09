<?php
include_once('../conec.php');
    if ($_GET['id']) {
        $id = $_GET['id'];

        $query = 'DELETE FROM vehiculos WHERE id_vehiculo=?';
        $delete = $conec->prepare($query);
        $delete->execute(array($id));
        header('Location: index.php');
    }
?>