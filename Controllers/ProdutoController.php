<?php
namespace Controllers;

use Models\Queries\ProdutosQueries\ProdutoQuerie;

require_once __DIR__ . '/../Models/Queries/ProdutosQueries/ProdutoQuerie.php';

class ProdutoController
{

    public function detalhes($idProduto) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($idProduto === null) {
            echo "Ocorreu um erro ao buscar o produto.";
            return;
        }

        $detalhesProduto = ProdutoQuerie::procurarPorId($idProduto);

        if ($detalhesProduto === false || $detalhesProduto === null) {
            echo "Produto não encontrado.";
            return;
        }

        // Definir se o usuário está logado
        $usuarioLogado = isset($_SESSION['cliente']) && !empty($_SESSION['cliente']);

        // Passar as variáveis para a view
        require_once __DIR__ . '/../Views/Produtos/detalhesProduto.php';
    }


    public function index()
    {
        $nomeCategoria = $_GET['categoria'] ?? null;

        if ($nomeCategoria === null || empty($nomeCategoria)) {
            echo "Ocorreu um erro ao buscar o nome da sua categoria";
            return;
        }

        $categoria = ProdutoQuerie::ProcurarIdPorNome($nomeCategoria);

        if ($categoria === false || $categoria === null) {
            echo "Categoria não encontrada.";
            return;
        }

        $idCategoria = $categoria['id'];

        $produtos = ProdutoQuerie::todas($idCategoria);

        require_once __DIR__ . '/../Views/Produtos/produtos.php';
    }
}
