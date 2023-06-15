<?php
include 'carrinho_compras.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['produto']) && isset($_POST['quantidade'])) {
        $produto = $_POST['produto'];
        $quantidade = $_POST['quantidade'];
        if ($quantidade > 0) {
            $carrinho->setItemQuantidade($produto, $quantidade);
            $_SESSION['carrinho'] = $carrinho;
        }
    }
}

header('Location: carrinho.php');
exit;
?>