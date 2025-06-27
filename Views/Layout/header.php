<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHBOX</title>

    <link rel="stylesheet" href="/css/Layout/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<div class="header">
    Bem-vindo! Contato: (81) 99110-6597
</div>

<nav class="navbar">
    <h3 class="logo">PHBOX</h3>

    <div class="nav-links">
        <a href="/home">Início</a>
        <a href="/index.php?controller=produto&action=index&categoria=eletronicos">Eletrônicos</a>
        <a href="/index.php?controller=produto&action=index&categoria=calcas">Calças</a>
        <a href="/index.php?controller=produto&action=index&categoria=Camisetas">Camisas</a>
        <a href="/index.php?controller=produto&action=index&categoria=calcados">Tênis</a>
        <a href="/index.php?controller=produto&action=index&categoria=OutonoEInverno">Acessórios</a>
        <a href="/index.php?controller=produto&action=index&categoria=LivrosEkindle">Kindle</a>
    </div>

    <a href="/index.php?controller=pedido&action=verificarPedido">Ver pedido</a>

    <div class="espaco">
        <a href="/Views/Cliente/cliente.php">Criar Conta</a>
        <a href="/Views/Cliente/clienteLogin.php">Entrar</a>

        <a class="fa fa-shopping-cart cart" href="/index.php?controller=carrinho&action=mostrar"></a>

        <a class="fas fa-user" href="/index.php?controller=cliente&action=perfil"></a>
    </div>
</nav>
