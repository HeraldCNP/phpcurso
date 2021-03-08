<?php

class Prestamo
{

    public $link = 'mysql:host=localhost;dbname=curso';
    public $user = 'root';
    public $pass = 'root';
    public function db()
    {
        try {
            $this->conec = new PDO($this->link, $this->user, $this->pass);
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        return $this->conec;
    }
    
    #Registrar prestamos
    public function create($vehiculo_id, $usuario_id, $fecha){
        $query = 'INSERT INTO prestamos (vehiculo_id, usuario_id, fecha) VALUES (?,?,?)';
        $db = $this->db();
        $insert = $db->prepare($query);
        $insert->execute(array($vehiculo_id, $usuario_id, $fecha));
        header('Location: indexP.php');
    }

    #Actualizar prestamos
    public function update($vehiculo_id, $usuario_id, $fecha, $id){
        //$query = 'UPDATE users SET email=?, password=? WHERE id=?';
        $query = "UPDATE prestamos 
        SET vehiculo_id=$vehiculo_id, usuario_id=$usuario_id, fecha='$fecha' WHERE id_prestamo=$id";
        $db = $this->db();
        $edit = $db->prepare($query);
        $edit->execute(array($vehiculo_id, $usuario_id, $fecha, $id));
        header('Location: indexP.php');
    }

    public function delete ($id) {
        $query = "DELETE FROM prestamos WHERE id_prestamo='$id'";
        $db = $this->db();
        $delete = $db->prepare($query);
        $delete->execute(array($id));
        header('Location: indexP.php');
    }
}
