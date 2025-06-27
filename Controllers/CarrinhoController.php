<?php

namespace Controllers;

use Models\Connection;
use Models\Queries\CarrinhoQueries\CarrinhoQuerie;

class CarrinhoController
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function adicionar()
    {
        $produto = $_POST['id'] ?? null;

        if ($produto === null) {
            http_response_code(400); // Resposta HTTP adequada
            echo json_encode(['erro' => 'Produto não informado.']);
            return;
        }

        $quantidade = CarrinhoQuerie::adicionarAoCarrinho($produto);

        echo json_encode([
            'mensagem' => 'Produto adicionado ao carrinho!',
            'quantidade' => $quantidade
        ]);
    }

    public function mostrar()
    {
        $carrinho = $_SESSION['carrinho'] ?? [];
        require_once __DIR__ . '/../Views/Carrinho/carrinho.php';
    }
}
