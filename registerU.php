<?php
include_once('conec.php');
    if($_POST){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $query = 'INSERT INTO users (email, password) VALUES (?,?)';
        $insert = $conec->prepare($query);
        $insert->execute(array($email, $password));
        header('Location: index.php');
    }
?>