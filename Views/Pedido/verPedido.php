<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Meus Pedidos</title>
    <link rel="stylesheet" href="/css/Layout/verPedido.css">
</head>
<body>
<?php include_once __DIR__ . '/../Layout/header.php'; ?>

<div class="pedido-container">
    <h1>Meus Pedidos</h1>

    <?php if (empty($pedidos)): ?>
    <div>
        <h2>Nenhum pedido ainda.</h2>
        <p>Parece que você não fez nenhum pedido ainda. Que tal explorar nossos produtos?</p>
        <a href="/Views/Produtos/produtos.php"></a>
    </div>
    <?php else: ?>
        <?php foreach ($pedidos as $pedido): ?>
            <div class="pedido-card">
                <p><strong>Id do pedido:</strong> <?= htmlspecialchars($pedido['id']) ?></p>
                <p><strong>Id do cliente:</strong> <?= htmlspecialchars($pedido['clienteId']) ?></p>
                <p><strong>Total do pedido:</strong> R$ <?= number_format($pedido['totalPedido'], 2, ',', '.') ?></p>
                <p><strong>Data do pedido:</strong> <?= htmlspecialchars($pedido['data_pedido']) ?></p>

                <?php if (!empty($pedido['itens'])): ?>
                    <div class="itens-pedido">
                        <h4>Itens do pedido:</h4>
                        <ul>
                            <?php foreach ($pedido['itens'] as $item): ?>
                                <li>
                                    <?= htmlspecialchars($item['nomeProduto']) ?> -
                                    <?= htmlspecialchars($item['quantidade']) ?>x -
                                    R$ <?= number_format($item['precoUnitario'], 2, ',', '.') ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <a href="/index.php?controller=pedido&action=cancelarPedido&idPedido=<?= $pedido['id'] ?>" class="botao-excluir">Excluir</a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <a href="/index.php?controller=produto&action=index" class="botao-voltar">Voltar aos produtos</a>
</div>

</body>
</html>
