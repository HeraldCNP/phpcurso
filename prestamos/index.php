<?php
include_once('../conec.php');

//$query = 'SELECT * FROM prestamos';
$query = "SELECT * 
        FROM prestamos p
                INNER JOIN vehiculos v 
                    ON p.vehiculo_id=v.id_vehiculo
                INNER JOIN users u
                    ON u.id=usuario_id";
$sent = $conec->prepare($query);
$sent->execute();
$prestamos = $sent->fetchAll();
//var_dump($prestamos);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/5f09ee6d09.js" crossorigin="anonymous"></script>
</head>

<body>
    <ul>
        <li><a href="">Prestamos</a></li>
        <li><a href="register.php">Nuevo</a></li>
       
    </ul>
    <table>
        <tr>
            <th>Modelo</th>
            <th>Usuario</th>
        </tr>
        <?php foreach ($prestamos as $prestamo) { ?>
            <tr>
                <td> <?php echo $prestamo['modelo'] ?> </td>
                <td> <?php echo $prestamo['email'] ?> </td>
                <td> 
                    <a href="editPrestamo.php?id=<?php echo $prestamo['id_prestamo'] ?>"><i class="far fa-edit"></i></a>
                    <a href="deletePrestamo.php?id=<?php echo $prestamo['id_prestamo'] ?>"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>