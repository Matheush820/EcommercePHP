<?php
include_once __DIR__ . '/../Layout/header.php';

$usuarioLogado = isset($_SESSION['cliente']) && !empty($_SESSION['cliente']);
?>

<link rel="stylesheet" href="/css/Layout/detalhesProduto.css">

<h2>Detalhes do Produto</h2>

<div class="card-content">
    <img src="<?= htmlspecialchars($detalhesProduto['imagem']) ?>" alt="Imagem do produto">

    <div class="info-produto">
        <p><strong>Nome:</strong> <?= htmlspecialchars($detalhesProduto['nome']) ?></p>
        <p><strong>Descrição:</strong> <?= htmlspecialchars($detalhesProduto['descricao']) ?></p>
        <p><strong>Preço:</strong> R$ <?= number_format($detalhesProduto['preco'], 2, ',', '.') ?></p>

        <div class="botoes">
            <form method="post" action="/index.php?controller=carrinho&action=adicionar" id="form-carrinho">
                <input type="hidden" name="id" value="<?= $detalhesProduto['id'] ?>">
                <button type="button" class="carrinho" onclick="verificarLogin('carrinho')">Adicionar ao Carrinho</button>
            </form>

            <form method="post" action="/index.php?controller=pedido&action=confirmar" id="form-pedido">
                <input type="hidden" name="id" value="<?= $detalhesProduto['id'] ?>">
                <button type="button" class="confirmar" onclick="verificarLogin('pedido')">Confirmar Pedido</button>
            </form>
        </div>
    </div>
</div>

<div id="modal" class="modal">
    <div class="modal-content">
        <h3>Para terminar sua ação, é necessário fazer login.</h3>
        <div style="display: flex; gap: 1rem; justify-content: center;">
            <a href="/Views/Cliente/clienteLogin.php" class="fechar botao-modal">Fazer login</a>
            <button class="fechar botao-modal" onclick="fecharModal()">Cancelar</button>
        </div>
    </div>
</div>

<script>
    window.__USUARIO_LOGADO__ = <?= $usuarioLogado ? 'true' : 'false' ?>;
    Object.freeze(window.__USUARIO_LOGADO__);


    function verificarLogin(acao) {


        if (!window.__USUARIO_LOGADO__) {
            console.log('Usuário não está logado -> abrirModal()');
            abrirModal();
            return;
        }

        console.log('Usuário logado -> prosseguindo com ação:', acao);

        if (acao === 'carrinho') {
            const form = document.getElementById('form-carrinho');
            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    console.log("Resposta do servidor:", data);
                    alert("Produto adicionado ao carrinho!");
                })
                .catch(error => {
                    console.error("Erro ao adicionar ao carrinho:", error);
                    alert("Erro ao adicionar ao carrinho.");
                });
        }

        if (acao === 'pedido') {
            document.getElementById('form-pedido').submit();
        }
    }

    function abrirModal() {
        console.log("abrirModal chamado");
        console.trace(); //  ISSO AQUI mostra a origem exata da chamada
        document.getElementById('modal').style.display = 'flex';
    }


    function fecharModal() {
        document.getElementById('modal').style.display = 'none';
    }

    // Teste de clique dos botões
    document.querySelectorAll('.carrinho, .confirmar').forEach(btn => {
        btn.addEventListener('click', e => {
            console.log('Botão clicado:', e.target);
        });
    });
</script>
</body>
</html>