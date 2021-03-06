<?php
    include_once('conec.php');

    $query = 'SELECT * FROM users';
    $sent = $conec->prepare($query);
    $sent->execute();
    $users = $sent->fetchAll();
    // var_dump($users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <script src="https://kit.fontawesome.com/5f09ee6d09.js" crossorigin="anonymous"></script>
</head>
<body>
    <ul>
        <li><a href="">Usuarios</a></li>
        <li><a href="registrarUser.php">Nuevo</a></li>
       
    </ul>
    <table>
        <tr>
        <th>Correo Electronico</th>
        <th>Contraseña</th>
        <th>Acciones</th>
        </tr>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?php echo $user['email'] ?></td>
            <td><?php echo $user['password'] ?></td>
            <td>
                <a href="editUser.php?id=<?php echo $user['id'] ?>"><i class="far fa-edit"></i></a>
                <a href="deleteUser.php?id=<?php echo $user['id'] ?>"><i class="far fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
    
</body>
</html>