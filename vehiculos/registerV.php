<?php
include_once('../conec.php');
    
    if ($_POST) {
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];

        $query = "INSERT INTO vehiculos (modelo, placa) VALUES ('$modelo','$placa')";
        $insert = $conec->prepare($query);
        $insert->execute(array($modelo, $placa));
        header('Location: index.php');
    }
?>