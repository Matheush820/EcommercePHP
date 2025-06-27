<?php

?>

<?php include_once __DIR__ . '/../Layout/header.php'; ?>
<link rel="stylesheet" href="/css/Layout/mostrarEditar.css">

<div>

    <form method="POST" action="/index.php?controller=cliente&action=atualizarDados">

        <div class="form-group">
            <label for="senha">Nova Senha</label>
            <input type="password" name="senha" id="senha" required />
        </div>

        <div class="form-group">
            <button type="submit" class="botao-confirmar">Atualizar Senha</button>
        </div>

        <a href="/index.php?controller=cliente&action=perfil">Voltar ao perfil</a>

    </form>


</div>
