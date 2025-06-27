<?php
namespace Models\Queries\CategoriaQueries;

use Models\Connection;

require_once __DIR__ . '/../../Connection.php';

class CategoriaQuerie
{
    public static function todas() {
        $conn = Connection::connect();
        $sql = "SELECT * FROM categoria";

        $stmt = $conn->query($sql);

        if (!$stmt) {
            // Opcional: tratar erro na consulta
            die("Erro na consulta: " . implode(" - ", $conn->errorInfo()));
        }

        // Pega todos os resultados como array associativo
        $categorias = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $categorias;
    }
}