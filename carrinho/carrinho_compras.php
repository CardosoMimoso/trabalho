<?php
session_start();

class CarrinhoDeCompras {
    private $itens = array();
    public function adicionarItem($produto, $quantidade) {
        if (isset($this->itens[$produto])) {
            $this->itens[$produto] += $quantidade;
        } else {
            $this->itens[$produto] = $quantidade;
        }
    }
    public function removerItem($produto) {
        if (isset($this->itens[$produto])) {
            unset($this->itens[$produto]);
        }
    }
    public function obterItens() {
        return $this->itens;
    }
}

require_once 'lista_produtos.php';

if (isset($_SESSION['carrinho'])) {
    $carrinho = $_SESSION['carrinho'];
} else {
    $carrinho = new CarrinhoDeCompras();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['adicionar'])) {
        $produto = $_POST['produto'];
        $quantidade = $_POST['quantidade'];
        $carrinho->adicionarItem($produto, $quantidade);
    } elseif (isset($_POST['remover'])) {
        $produto = $_POST['produto'];
        $carrinho->removerItem($produto);
    } elseif (isset($_POST['limpar'])) {
        $carrinho->limparCarrinho();
    }
    $_SESSION['carrinho'] = $carrinho;
}

$itens = $carrinho->obterItens();

foreach ($itens as $produto => $quantidade) {
    $produtoEncontrado = null;
    foreach ($listaProdutos as $item) {
        if ($item['item'] == $produto) {
            $produtoEncontrado = $item;
            break;
        }
    }
}