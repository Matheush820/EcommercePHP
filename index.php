<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/vendor/autoload.php';

$controller = $_GET['controller'] ?? 'categoria';
$action = $_GET['action'] ?? 'index';
$action = lcfirst($action);

$controllerClass = 'Controllers\\' . ucfirst($controller) . 'Controller';

if (class_exists($controllerClass)) {
    $controllerObj = new $controllerClass();

    if (method_exists($controllerObj, $action)) {
        if ($controller == 'produto' && $action == 'detalhes') {
            $id = $_GET['id'] ?? null;
            $controllerObj->detalhes($id);

        } elseif ($controller == 'pedido' && $action == 'verificarPedido') {
            $idCliente = $_SESSION['cliente'] ?? null;


            if (!$idCliente) {
                header('Location: /index.php?controller=cliente&action=loginRequired');
                return;
            }

            $controllerObj->verificarPedido($idCliente);

        } elseif ($controller == 'pedido' && $action == 'cancelarPedido') {
            $idPedido = $_GET['idPedido'] ?? null;
            $idCliente = $_SESSION['cliente'] ?? null;

            if (!$idPedido) {
                echo "ID do pedido não informado.";
                return;
            }

            if (!$idCliente) {
                echo "Cliente não está logado.";
                return;
            }

            // Passa os dois parâmetros para o método cancelarPedido
            $controllerObj->cancelarPedido($idPedido, $idCliente);

        } else {
            $controllerObj->$action();
        }
    } else {
        echo "Ação '$action' não encontrada.";
    }
} else {
    echo "Controller '$controllerClass' não encontrado.";
}
