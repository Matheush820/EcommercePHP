<?php

namespace Models\Queries\ClienteQueries;

use Models\Connection;

class ClienteQueries
{
    public static function buscarPorId($id)
    {
        $conn = Connection::connect();
        $sql = "SELECT id, nome, email FROM cliente WHERE id = :id LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }


    public static function atualizarSenhaPorId($idCliente, $novaSenha){
        $conn = Connection::connect();

        $sql = "UPDATE cliente SET senha = :senha WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':senha' => $novaSenha,
            ':id' => $idCliente,
        ]);

        return $stmt->rowCount() > 0;
    }

    public static function criarCliente(string $nome, string $email, string $senha)
    {
        $conn = Connection::connect();

        $sql = "INSERT INTO cliente (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' =>  $senha
        ]);
    }

    public static function verificarEmail(string $email)
    {
        $conn = Connection::connect();

        $sql = "SELECT Count(*) FROM cliente WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetchColumn() > 0;
    }

    public static function buscarPorEmailLogin(string $email)
    {

        $conn = Connection::connect();

        $sql = "SELECT * FROM cliente WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
