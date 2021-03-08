<?php
    if($_GET['id']){
        include('conectP.php');
        $delete = new Prestamo();
        $id=$_GET['id'];
        $res = $delete->delete($id);
    }
?>