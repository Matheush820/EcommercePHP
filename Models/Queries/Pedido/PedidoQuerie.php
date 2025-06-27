<?php

namespace Models\Queries\Pedido;

use Models\Connection;

class PedidoQuerie
{
    public static function excluirPedido($idPedido)
    {
        $conn = Connection::connect();

        $sql = "DELETE FROM pedido WHERE id = :id";
        $smtm = $conn->prepare($sql);
        $smtm->execute([':id' =>  $idPedido]);

        return $smtm->rowCount() > 0;

    }

    public static function verPedidos($idCliente)
    {
        $conn = Connection::connect();

        $sql = 'SELECT * FROM pedido WHERE clienteId = :clienteId ORDER BY data_pedido DESC';
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':clienteId' => $idCliente,

        ]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function criarPedido($idCliente, $totalPedido)
    {
        $conn = Connection::connect();

        $sql = "INSERT INTO pedido (clienteId, totalPedido, data_pedido) VALUES (?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$idCliente, $totalPedido]);
    }
}