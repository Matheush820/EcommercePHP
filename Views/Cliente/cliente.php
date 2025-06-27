<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="/css/Layout/cliente.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Cadastro de Cliente</title>
    <style>

    </style>
</head>
<body>

<div class="form-container">
    <a href="/home">
        <i class="fas fa-arrow-left"></i>
    </a>

    <h2>Cadastro de Cliente</h2>
    <form method="POST" action="/index.php?controller=cliente&action=criarCliente">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email" placeholder="Digite seu email" required>

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>

        <a class="register" href="/Views/Cliente/clienteLogin.php">Faça login</a>

        <button type="submit">Cadastro</button>
    </form>

    <!-- Mensagens aqui se quiser usar com PHP -->
    <?php if (isset($_GET['sucesso'])): ?>
        <p class="mensagem">Cadastro realizado com sucesso!</p>
    <?php elseif (isset($_GET['erro'])): ?>
        <p class="mensagem erro">Erro ao cadastrar: <?= htmlspecialchars($_GET['erro']) ?></p>
    <?php endif; ?>
</div>

</body>
</html>
