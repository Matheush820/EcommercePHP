<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="/css/Layout/perfil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<?php include_once __DIR__ . '/../Layout/header.php'; ?>

<div class="perfil-container">
    <div class="perfil-info">
        <h2>Bem-vindo, <?= htmlspecialchars($usuario['nome']) ?>!</h2>
        <p><strong>Email cadastrado:</strong> <?= htmlspecialchars($usuario['email']) ?></p>
    </div>

    <div class="perfil-acoes">
        <a class="botao-sair" href="/index.php?controller=cliente&action=logout" title="Sair">
            <i class="fa-solid fa-right-from-bracket"></i> Sair
        </a>
        <a class="botao-senha" href="/index.php?controller=cliente&action=mostrarEditar">Alterar senha</a>
    </div>
</div>

</body>
</html>
