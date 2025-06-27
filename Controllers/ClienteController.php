<?php

namespace Controllers;

use Models\Queries\ClienteQueries\ClienteQueries;

class ClienteController
{
    public function mostrarEditar()
    {
        $idUsuario = $_SESSION['cliente'] ?? null;

        if (!$idUsuario) {
            echo 'erro';
            return;
        }

        include __DIR__ . '/../Views/Cliente/mostrarEditar.php';

    }
    public function perfil()
    {
        $idUsuario = $_SESSION['cliente'] ?? null;

        if (!$idUsuario) {
            echo 'erro';
            return;
        }

        $usuario = ClienteQueries::buscarPorId($idUsuario);

        include __DIR__ . '/../Views/Cliente/perfil.php';
    }


    public function atualizarDados(){
        $idCliente = $_SESSION['cliente'] ?? null;

        if(!$idCliente){
            echo 'Cliente não autenticado';
            return;
        }

        $novaSenha = $_POST['senha'] ?? null;

        if(!$novaSenha){
            echo 'Senha obrigatória';
            return;
        }

        $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

        $atualizado = ClienteQueries::atualizarSenhaPorId($idCliente, $senhaHash);

        if($atualizado){
            echo 'Senha atualizada com sucesso';
        } else {
            echo 'Erro ao atualizar senha';
        }
    }


    public static function loginRequired() {
        include __DIR__ . '/../Views/Cliente/loginRequired.php';
    }

    public static function logout(){
        $_SERVER = [];

        session_destroy();
        header('Location: /index.php?controller=categoria&action=index');
        exit;
    }

    public static function loginCliente() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? null;
            $senha = $_POST['senha'] ?? null;

            if (empty($email) || empty($senha)) {
                echo 'Preencha todos os campos';
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo 'Email inválido';
                return;
            }

            $usuario = ClienteQueries::buscarPorEmailLogin($email);

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                $_SESSION['cliente'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                // Redirecionar para dashboard ou home
                header('Location: /index.php?controller=categoria&action=index');
                exit;
            } else {
                echo 'Não foi possível fazer login';
            }
        } else {
            echo 'Método inválido';
        }
    }

    public static function criarCliente()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? null;
            $email = $_POST['email'] ?? null;
            $senha = $_POST['senha'] ?? null;

            if (empty($nome) || empty($email) || empty($senha)) {
                echo 'Preencha todos os campos';
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo 'Tipo de email inválido';
                return;
            }

            if(ClienteQueries::verificarEmail($email)){
                echo 'email ja cadastrado';
                return;
            }

            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);


            ClienteQueries::criarCliente($nome, $email, $senhaHash);
            echo 'Cadastro realizado com sucesso';
            require_once __DIR__ . '/../Views/Cliente/cliente.php';
        } else {
            echo 'Erro ao cadastrar: método inválido';
        }

    }
}
