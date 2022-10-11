<?php
require_once "../config/connection.php";
class Alumno extends Connection
{
    public static function getData()
    {
        try {
            $sql = 'SELECT * FROM asi104';
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
            $sql = "SELECT * FROM asi104 WHERE id=:id";
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
            $sql = "INSERT INTO asi104 (nombre,apellido,carnet,edad) VALUES (:nombre, :apellido, :carnet, :edad)";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(':nombre', $data['nombre']);
            $stmt->bindParam(':apellido', $data['apellido']);
            $stmt->bindParam(':carnet', $data['carnet']);
            $stmt->bindParam(':edad', $data['edad']);
            $stmt->execute();
            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
    public static function setData($data)
    {
        try {
            $sql = "UPDATE asi104 SET nombre=:nombre, apellido=:apellido, carnet=:carnet, edad=:edad WHERE id=:id";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(':nombre', $data['nombre']);
            $stmt->bindParam(':apellido', $data['apellido']);
            $stmt->bindParam(':carnet', $data['carnet']);
            $stmt->bindParam(':edad', $data['edad']);
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
            $sql = "DELETE FROM asi104 WHERE id = :id";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
}
