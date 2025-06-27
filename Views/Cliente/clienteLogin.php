<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="/css/Layout/cliente.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Login</title>
    <style>

    </style>
</head>
<body>

<div class="form-container">
    <a href="/home">
        <i class="fas fa-arrow-left"></i>
    </a>

    <h2>Tela de login</h2>

    <form method="POST" action="/index.php?controller=cliente&action=loginCliente">

        <label for="email">Email:</label>
        <input type="text" name="email" id="email" placeholder="Digite seu email" required>

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required
        >
        <a class="enter" href="/Views/Cliente/cliente.php">Criar Conta</a>

        <button type="submit">Entrar</button>


    </form>

    <!-- Mensagens aqui se quiser usar com PHP -->
    <?php if (isset($_GET['sucesso'])): ?>
        <p class="mensagem">Login realizado com sucesso!</p>
    <?php elseif (isset($_GET['erro'])): ?>
        <p class="mensagem erro">Erro ao cadastrar: <?= htmlspecialchars($_GET['erro']) ?></p>
    <?php endif; ?>
</div>

</body>
</html>
