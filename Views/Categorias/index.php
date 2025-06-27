<?php


include("views/layout/header.php");

// Verifica se a variável $categorias existe e tem pelo menos 6 categorias
if (!isset($categorias) || count($categorias) < 6) {
    echo "<p style='color:red;'>Erro: categorias não carregadas corretamente.</p>";
    return;
}

$cores = ['#f1efef', '#f1efef', '#f1efef', '#f1efef', '#f1efef', '#f1efef'];
?>

<link rel="stylesheet" href="css/Layout/categorias.css">

<div class="categorias-container">
    <!-- Card destaque (todos clicaveis) -->
    <div class="categoria-card destaque" style="background-image: url('<?= htmlspecialchars($categorias[0]['imagem'] ?? '') ?>');">
        <a href="/index.php?controller=produto&action=index&categoria=<?= urlencode($categorias[0]['nome'] ?? '') ?>" class="categoria-link">
            <p style="font-family: 'Bell MT'">
                <?= htmlspecialchars($categorias[0]['nome'] ?? '') ?><br>
                Conheça nossos produtos.
            </p>
            <div class="botao-destaque">Compre agora</div>
        </a>
    </div>

    <!-- Dois cards abaixo -->
    <div class="categoria-card card1" style="background-image: url('<?= htmlspecialchars($categorias[1]['imagem'] ?? '') ?>');">
        <a href="/index.php?controller=produto&action=index&categoria=<?= urlencode($categorias[1]['nome'] ?? '') ?>" class="categoria-link">
            <p style="font-family: 'Bell MT'">
                <?= htmlspecialchars($categorias[1]['nome'] ?? '') ?><br>
                Aproveite as ofertas exclusivas.
            </p>
        </a>
    </div>

    <div class="categoria-card card2" style="background-image: url('<?= htmlspecialchars($categorias[2]['imagem'] ?? '') ?>');">
        <a href="/index.php?controller=produto&action=index&categoria=<?= urlencode($categorias[2]['nome'] ?? '') ?>" class="categoria-link">
            <p style="font-family: 'Bell MT'">
                <?= htmlspecialchars($categorias[2]['nome'] ?? '') ?><br>
                Produtos de qualidade, só aqui!
            </p>
        </a>
    </div>
</div>

<!-- Seção com cards redondos -->
<div class="sessao-colorida">
    <h3 class="sessao-colorida-header">Encontre o produto ideal para você</h3>
    <div class="cards-redondos">

        <!-- Card 1 -->
        <div class="card-redondo-container">
            <a href="/index.php?controller=produto&action=index&categoria=<?= urlencode($categorias[3]['nome'] ?? '') ?>">
                <div class="card-redondo">
                    <img src="<?= htmlspecialchars($categorias[3]['imagem'] ?? '') ?>" alt="Produto" class="card-img">
                </div>
                <p class="card-titulo">
                    <?= htmlspecialchars($categorias[3]['nome'] ?? '') ?> <i class="fa fa-arrow-right"></i>
                </p>
            </a>
        </div>

        <!-- Card 2 -->
        <div class="card-redondo-container">
            <a href="/index.php?controller=produto&action=index&categoria=<?= urlencode($categorias[4]['nome'] ?? '') ?>">
                <div class="card-redondo">
                    <img src="<?= htmlspecialchars($categorias[4]['imagem'] ?? '') ?>" alt="Produto" class="card-img">
                </div>
                <p class="card-titulo">
                    <?= htmlspecialchars($categorias[4]['nome'] ?? '') ?> <i class="fa fa-arrow-right"></i>
                </p>
            </a>
        </div>

        <!-- Card 3 -->
        <div class="card-redondo-container">
            <a href="/index.php?controller=produto&action=index&categoria=<?= urlencode($categorias[5]['nome'] ?? '') ?>">
                <div class="card-redondo">
                    <img src="<?= htmlspecialchars($categorias[5]['imagem'] ?? '') ?>" alt="Produto" class="card-img">
                </div>
                <p class="card-titulo">
                    <?= htmlspecialchars($categorias[5]['nome'] ?? '') ?> <i class="fa fa-arrow-right"></i>
                </p>
            </a>
        </div>

    </div>
</div>

<!-- Último card -->
<div class="ultimo-card">
    Pronto para renovar seu estilo? <br> Descubra novidades e promoções exclusivas agora!
    <br><br>
    <a href="/explorar" class="botao-final">Explorar Produtos</a>
</div>
