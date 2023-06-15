<?php
include 'lista_produtos.php';
include 'carrinho_compras.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto = $_POST['produto'];
    $acao = $_POST['acao'];

    if ($acao === 'aumentar') {
        $carrinho->adicionarProduto($produto);
    } elseif ($acao === 'diminuir') {
        $carrinho->removerProduto($produto);
    }

    header('Location: carrinho1.php');
    exit;
}
?>