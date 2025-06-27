<?php

namespace Models;

use PDO;

class Connection
{
    private static $dbName = 'mysql:host=localhost;port=3306;dbname=ecommerce';
    private static $user = 'root';
    private static $password = 'Legiondbd123#';

    public static function connect() {
        try {
            $conn = new PDO(self::$dbName, self::$user, self::$password);
            $conn->exec("SET CHARACTER SET utf8");
            return $conn;
        } catch (\PDOException $error) {
            die("Erro ao conectar: " . $error->getMessage());
        }
    }
}
