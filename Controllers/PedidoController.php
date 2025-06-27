<?php

namespace Controllers;

use Models\Queries\Pedido\PedidoQuerie;
use Models\Queries\ProdutosQueries\ProdutoQuerie;

class PedidoController
{
    public function cancelarPedido($idPedido, $idCliente)
    {
        if (!$idPedido || !$idCliente) {
            echo 'ID do pedido ou do cliente não foi informado.';
            return;
        }

        $pedidos = PedidoQuerie::verPedidos($idCliente);

        $pedidoExiste = false;
        foreach ($pedidos as $pedido) {
            if ($pedido['id'] == $idPedido) {
                $pedidoExiste = true;
                break;
            }
        }

        if (!$pedidoExiste) {
            echo 'Pedido não existe.';
            return;
        }

        $excluido = PedidoQuerie::excluirPedido($idPedido);

        if (!$excluido) {
            echo 'Não foi possível cancelar seu pedido.';
        } else {
            echo 'Pedido cancelado com sucesso.';
        }
    }



    public function confirmar()
    {
        if (!isset($_SESSION['cliente'])) {
            echo 'É necessário estar logado para finalizar a compra.';
            return;
        }

        if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
            echo 'Carrinho vazio.';
            return;
        }

        $idCliente = $_SESSION['cliente'];
        $total = 0;

        foreach ($_SESSION['carrinho'] as $item) {
            $total += $item['valor'] * $item['quantidade'];
        }

        // Cria o pedido com o total calculado
        PedidoQuerie::criarPedido($idCliente, $total);

        // Limpa o carrinho depois de confirmar o pedido
        unset($_SESSION['carrinho']);

        require_once __DIR__ . '/../Views/Pedido/pedidoConfirmado.php';
    }

    public function verificarPedido($idCliente)
    {
        $pedidos = PedidoQuerie::verPedidos($idCliente);

        if (!$pedidos) {
            echo "Pedido não encontrado.";
            return;
        }

        require_once __DIR__ . '/../Views/Pedido/verPedido.php';
    }


}
