<?php
include_once('conec.php');
    if($_POST){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $id = $_POST['id'];
        
        $query = 'UPDATE users SET email=?, password=? WHERE id=?';
        $edit = $conec->prepare($query);
        $edit->execute(array($email, $password, $id));
        header('Location: index.php');
    }
?>