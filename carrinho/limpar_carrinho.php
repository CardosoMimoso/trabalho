<?php
    session_start();
    $_SESSION['carrinho'] = null;
    header("location: carrinho.php"); 
?>