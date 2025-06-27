<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>E</title>
    <link rel="stylesheet" href="/css/Layout/produto.css">
</head>
<body>

<?php include_once __DIR__ . '/../Layout/header.php'; ?>


<div class="produtos-container">
    <?php if (empty($produtos)): ?>
        <p>Nenhum produto encontrado.</p>
    <?php else: ?>
        <?php foreach ($produtos as $produto): ?>
            <a href="/index.php?controller=produto&action=detalhes&id=<?= urlencode($produto['id']) ?>" class="produto-link">
            <div class="produto-card">
                <img src="<?= htmlspecialchars($produto['imagem']) ?>" alt="<?= htmlspecialchars($produto['nome']) ?>" class="produto-imagem">
                <h4><?= htmlspecialchars($produto['nome']) ?></h4>
                <p><?= htmlspecialchars($produto['descricao']) ?></p>
                <p>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
            </div>
        </a>

        <?php endforeach; ?>
    <?php endif; ?>
</div>

</body>
</html>
