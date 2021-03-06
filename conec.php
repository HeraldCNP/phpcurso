<?php
$link = 'mysql:host=localhost;dbname=curso';
$user = 'root';
$pass = '';
try {
    $conec = new PDO($link, $user, $pass);
    // foreach($conec->query('SELECT * from FOO') as $fila) {
    //     print_r($fila);
    // }
    // $conec = null;
    // echo('conectado');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>