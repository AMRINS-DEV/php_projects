<?php
class db
{
    public static $conn = null;
    public static function connect()
    {
        try {
            // $host = "bestsideconsulting.ma";
            // $db = "u230791526_caissedb";
            // $user = "u230791526_caissedb";
            // $pwd = "JAMALamrins@hostinger.1998";
            $host = "localhost";
            $db = "chatapp";
            $user = "root";
            $pwd = "";

            $pdo = new PDO("mysql:host=$host;dbname=$db", "$user", "$pwd");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            self::$conn = $pdo;
        } catch (PDOException $e) {
            return "database error";
        }
    }

    public static function select($query)
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}


db::connect();
