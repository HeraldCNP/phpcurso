<?php
    include_once('conec.php');
    if($_GET['id']){
        $id = $_GET['id'];
    
        $query = 'SELECT * FROM users WHERE id=?';
        $sent = $conec->prepare($query);
        $sent->execute(array($id));
        $user = $sent->fetch();
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <div>
        <form action="updateUser.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $user['email'] ?>">
            <input type="text" name="password" id="password" value="<?php echo $user['password'] ?>">
            <input type="hidden" name="id" id="id" value="<?php echo $user['id'] ?>">
            <input type="submit" value="Editar">
        </form>
    </div>
</body>
</html>