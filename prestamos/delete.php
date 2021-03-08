<?php
include_once('../conec.php');
    if($_GET['id']){
        $id=$_GET['id'];

        $query = "DELETE FROM prestamos WHERE id_prestamo='$id'";
        $delete = $conec->prepare($query);
        $delete->execute(array($id));
        header('Location: index.php');
    }
?>