<?php

namespace Models\Queries\ProdutosQueries;

use Models\Connection;

require_once __DIR__ . '/../../Connection.php';

class ProdutoQuerie
{
    public static function procurarPedidoProduto($clienteId)
    {
        $conn = Connection::connect();
        // Exemplo simples: busca os pedidos
        $sqlPedidos = "SELECT * FROM pedido WHERE clienteId = :clienteId";
        $stmtPedidos = $conn->prepare($sqlPedidos);
        $stmtPedidos->bindParam(':clienteId', $clienteId);
        $stmtPedidos->execute();
        $pedidos = $stmtPedidos->fetchAll(PDO::FETCH_ASSOC);

// Para cada pedido, buscar os itens
        foreach ($pedidos as &$pedido) {
            $sqlItens = "SELECT pi.produtoId, pi.quantidade, pi.precoUnitario, p.nome AS nomeProduto
FROM pedido_item pi
INNER JOIN produto p ON pi.produtoId = p.id
WHERE pi.pedidoId = :pedidoId
";
            $stmtItens = $conn->prepare($sqlItens);
            $stmtItens->bindParam(':pedidoId', $pedido['id']);
            $stmtItens->execute();
            $pedido['itens'] = $stmtItens->fetchAll(PDO::FETCH_ASSOC);
        }

        return $pedidos;

    }

    public static function procurarPorId($idProduto)
    {
        $conn = Connection::connect();

        $sql = "SELECT * FROM produto WHERE id = ? LIMIT 1";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idProduto]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }


    public  static function  ProcurarIdPorNome($nomeCategoria)
    {
        $conn = Connection::connect();

        $sql = "SELECT id FROM categoria WHERE nome = ? LIMIT 1";

        $smtm = $conn->prepare($sql);
        $smtm->execute([$nomeCategoria]);

        return $smtm->fetch(\PDO::FETCH_ASSOC);
    }

    public static function todas($idCategoria)
    {
        $conn = Connection::connect();

        $sql = "SELECT * FROM produto WHERE categoriaId = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idCategoria]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


}
