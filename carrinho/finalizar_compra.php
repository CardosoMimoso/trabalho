<?php
include 'lista_produtos.php';
include 'carrinho_compras.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <section class="h-100" style="background-color: white;">
        <div class="container h-100 py-5">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">
      
              <h1>Carrinho de Compras</h1>
      
              <?php
              $itens = $carrinho->obterItens();
      
              foreach ($itens as $produto => $quantidade) {
                  $produtoEncontrado = null;
                  foreach ($listaProdutos as $item) {
                      if ($item['item'] == $produto) {
                          $produtoEncontrado = $item;
                          break;
                      }
                  }
                  if ($produtoEncontrado) {
                      $subtotal = $produtoEncontrado['valor'] * $quantidade;
                      echo "<div class=\"card rounded-3 mb-4\">
                              <div class=\"card-body p-4\">
                                <div class=\"row d-flex justify-content-between align-items-center\">
                                  <div class=\"col-md-2 col-lg-2 col-xl-2\">
                                    <img src=\"{$produtoEncontrado['imagem']}\" class=\"img-fluid rounded-3\" alt=\"{$produtoEncontrado['nome']}\">
                                  </div>
                                  <div class=\"col-md-3 col-lg-3 col-xl-3\">
                                    <p class=\"lead fw-normal mb-2\">{$produtoEncontrado['nome']}</p>
                                  </div>
                                  <div class=\"col-md-3 col-lg-3 col-xl-2 d-flex\">
                                      <span>{$quantidade}</span>
                                  </div>
                                  <div class=\"col-md-3 col-lg-2 col-xl-2 offset-lg-1\">
                                    <h5 class=\"mb-0\">R$ {$subtotal}</h5>
                                  </div>
                                  <div class=\"col-md-1 col-lg-1 col-xl-.2\">
                                    <form action=\"remover_item.php\" method=\"post\">
                                      <button class=\"btn btn-link text-danger\" type=\"submit\" name=\"produto\" value=\"{$produto}\">
                                        <i class=\"fas fa-trash-alt\"></i>
                                      </button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>";
                  }
              }
              $valorTotal = 0;
              foreach ($itens as $produto => $quantidade) {
                  $produtoEncontrado = null;
                  foreach ($listaProdutos as $item) {
                      if ($item['item'] == $produto) {
                          $produtoEncontrado = $item;
                          break;
                      }
                  }
                  if ($produtoEncontrado) {
                      $subtotal = $produtoEncontrado['valor'] * $quantidade;
                      $valorTotal += $subtotal;
                  }
              }
              echo "<h3>Valor Total: R$ {$valorTotal}</h3>";
              ?>
              <div class="text-end">
                <form action="voltar_tela.php" method="post">
                  <button class="btn btn-primary" type="submit">Finalizar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </body>
</html>