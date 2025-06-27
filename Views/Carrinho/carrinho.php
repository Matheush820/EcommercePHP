<?php include_once __DIR__ . '/../Layout/header.php'; ?>
<link rel="stylesheet" href="/css/Layout/carrinho.css">

<h2 class="header">Meu carrinho</h2>

<div class="carrinho-container">
    <?php if(empty($carrinho)): ?>
        <p class="mensagem-vazio">Seu carrinho está vazio.</p>
    <?php else: ?>
        <ul class="lista-carrinho">
            <?php foreach($carrinho as $produto): ?>
                <li class="item-carrinho">
                    <span class="produto-nome"><?= htmlspecialchars($produto['nome']) ?></span>
                    <span class="produto-preco">R$ <?= number_format($produto['valor'], 2, ',', '.') ?></span>
                    <span class="produto-qtd">Qtd: <?= htmlspecialchars($produto['quantidade']) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>

        <p class="total"><strong>Total: R$ <?= number_format(array_reduce($carrinho, function($total, $p) {
                    return $total + $p['valor'] * $p['quantidade'];
                }, 0), 2, ',', '.') ?></strong></p>

        <a class="botao-finalizar" href="/index.php?controller=pedido&action=confirmar">Finalizar Compra</a>
    <?php endif; ?>
</div>
