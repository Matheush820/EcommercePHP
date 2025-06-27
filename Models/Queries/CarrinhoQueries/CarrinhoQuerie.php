<?php

namespace Models\Queries\CarrinhoQueries;

use Models\Connection;
use Models\Queries\ProdutosQueries\ProdutoQuerie;

class CarrinhoQuerie
{
    public static function adicionarAoCarrinho($idProduto)
    {

        // Buscar o produto pelo ID, passando o idProduto corretamente
        $produto = ProdutoQuerie::procurarPorId($idProduto);

        if ($produto == null) {
            echo 'Ocorreu um erro ao adicionar produto ao carrinho';
            return;
        }

        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        // Se o produto já está no carrinho, aumentar quantidade
        if (isset($_SESSION['carrinho'][$idProduto])) {
            $_SESSION['carrinho'][$idProduto]['quantidade']++;
        } else {
            $_SESSION['carrinho'][$idProduto] = [
                'idProduto' => $idProduto,
                'nome' => $produto['nome'],
                'valor' => $produto['preco'],
                'quantidade' => 1,
            ];
        }

        // Retorna a quantidade atual do produto no carrinho
        return $_SESSION['carrinho'][$idProduto]['quantidade'];
    }
}
