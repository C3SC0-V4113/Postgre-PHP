<?php
require_once "../config/connection.php";
class Jugador extends Connection
{
    public static function getData()
    {
        try {
            $sql = 'SELECT * FROM jugador';
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public static function getByID($id)
    {
        try {
            $sql = "SELECT * FROM jugador WHERE id=:id";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
    public static function postData($data)
    {
        try {
            $sql = "INSERT INTO jugador (nombre,posicion,camiseta) VALUES (:nombre, :posicion, :camiseta)";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(':nombre', $data['nombre']);
            $stmt->bindParam(':posicion', $data['posicion']);
            $stmt->bindParam(':camiseta', $data['camiseta']);
            $stmt->execute();
            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
    public static function setData($data)
    {
        try {
            $sql = "UPDATE jugador SET nombre=:nombre, posicion=:posicion, camiseta=:camiseta WHERE id=:id";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(':nombre', $data['nombre']);
            $stmt->bindParam(':posicion', $data['posicion']);
            $stmt->bindParam(':camiseta', $data['camiseta']);
            $stmt->bindParam(':id', $data['id']);
            $stmt->execute();
            return true;    // success
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
    public static function deleteData($id)
    {
        try {
            $sql = "DELETE FROM jugador WHERE id = :id";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
}
