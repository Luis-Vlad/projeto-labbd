<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Projeto Lab. Banco de Dados - Pedidos</title>
</head>
<body>

    <?php
    include('../db.php');
    ?>

    <h1 class="text-center bg-primary text-white mb-5">Pedidos</h1>

    <div class="container">

        <form class="row" action="/projeto-labbd/controllers/pedido-controller.php" method="POST">
            <div class="col-12 text-center">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="data">Data:</label>
                        </div>
                        <div class="d-flex">
                            <input type="date" class="form-control" name="data" id="data" required>
                        </div>
                    </div>
                    <div class="col-sm-4">

                        <div class="d-flex">
                            <label for="cliente">Cliente:</label>
                        </div>
                        <div class="d-flex">
                            <?php
                                // include('db.php');
                                $query = "SELECT id_clientes, nome FROM clientes ORDER BY nome";
                                $resu = mysqli_query($con, $query);
                            ?>

                            <select name="id_cliente" id="id_cliente" class="form-control" required>
                                <option value="">Selecione um cliente</option>
                                <?php
                                    while ($reg = mysqli_fetch_array($resu)) {
                                        echo "<option value='" . $reg['id_clientes'] . "'>" . $reg['nome'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="observacao">Observação:</label>
                        </div>
                        <div class="d-flex">
                            <input type="text" class="form-control" name="observacao" id="observacao">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="id_forma_pagto">Forma de Pagamento:</label>
                        </div>
                        <div class="d-flex">

                            <?php
                                // include('db.php');
                                $query = "SELECT id_forma_pagto, nome FROM forma_pagto ORDER BY nome";
                                $resu = mysqli_query($con, $query);
                            ?>

                            <select name="id_forma_pagto" class="form-control" id="id_forma_pagto" required>
                                <option value="">Selecione a Forma de Pagamento</option>
                                <?php
                                    while ($reg = mysqli_fetch_array($resu)) {
                                        echo "<option value='" . $reg['id_forma_pagto'] . "'>" . $reg['nome'] . "</option>";
                                    }
                                ?>
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="prazo_entrega">Prazo de Entrega:</label>
                        </div>
                        <div class="d-flex">
                            <input type="text" class="form-control" name="prazo_entrega" id="prazo_entrega" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="vendedor">Vendedor:</label>
                        </div>
                        <div class="d-flex">


                            <?php
                                // include('db.php');
                                $query = "SELECT id_vendedor, nome FROM vendedor ORDER BY nome";
                                $resu = mysqli_query($con, $query);
                            ?>

                            <select name="id_vendedor" class="form-control" id="id_vendedor" required>
                                <option value="">Selecione um vendedor</option>
                                <?php
                                    while ($reg = mysqli_fetch_array($resu)) {
                                        echo "<option value='" . $reg['id_vendedor'] . "'>" . $reg['nome'] . "</option>";
                                    }
                                ?>
                            </select>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="itens">Itens (Produtos):</label>
                        </div>
                        <div class="d-flex">


                            <?php
                                // include('db.php');
                                $query = "SELECT id_produto, nome, qtde_estoque FROM produto ORDER BY nome";
                                $resu = mysqli_query($con, $query);
                            ?>

                            <select name="produto" class="form-control" id="produto" required>
                                <option value="">Selecione um produto</option>
                                <?php
                                    while ($reg = mysqli_fetch_array($resu)) {
                                        echo "<option value='" . $reg['id_produto'] . "'>" . $reg['nome'] . "</option>";
                                    }
                                ?>
                            </select>

                            <?php
                                // include('db.php');
                                $query = "SELECT id_produto, qtde_estoque FROM produto ORDER BY nome";
                                $resu = mysqli_query($con, $query);
                            ?>

                            <?php
                            
                                while ($reg = mysqli_fetch_array($resu)) {
                                    echo "<input type='hidden' id='qtdeBd" . $reg['id_produto'] . "' value='" . $reg['qtde_estoque'] . "'>";
                                }
                            
                            ?>

                            <div class="d-flex">

                                <input type="number" class="form-control" id="produtoQtde" class="w-100" required>

                            </div>

                            <button type="button" id="addProduto" class="btn btn-primary">+</button>

                        </div>

                    </div>

                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="prazo_entrega">Descrição (Pedidos-Cliente):</label>
                        </div>
                        <div class="d-flex">
                            <input type="text" class="form-control" name="descricao" id="descricao">
                        </div>
                    </div>

                </div>

                <div class="row mt-5">

                    <div class="col-sm-12">

                        <hr>
                        <h3>Itens:</h3>
                        <ul id="listaProdutos" class="d-flex flex-column align-items-center">
                        </ul>

                    </div>
                    
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <a href="/projeto-labbd/index.php" class="btn btn-secondary rounded mr-2">Voltar</a>
                    <button class="btn btn-success rounded ml-2" name="action" value="create" type="submit">Salvar</button>
                </div>
            </div>
        </form>

    </div>

    <hr>

    <div class="row mb-3">
        <div class="col-sm-12">
            <h3 class="text-center">Cadastros:</h3>
        </div>
    </div>

    <?php

        $query = "SELECT 
                p.id_pedido, 
                p.data AS data_pedido, 
                p.observacao, 
                p.prazo_entrega, 
                c.nome AS cliente_nome, 
                c.email AS cliente_email,
                fp.nome AS forma_pagto, 
                v.nome AS vendedor_nome, 
                v.email AS vendedor_email,
                ip.qtde AS item_quantidade, 
                pr.nome AS produto_nome, 
                pr.preco AS produto_preco
            FROM 
                pedidos p
            LEFT JOIN clientes c ON p.id_cliente = c.id_clientes
            LEFT JOIN forma_pagto fp ON p.id_forma_pagto = fp.id_forma_pagto
            LEFT JOIN vendedor v ON p.id_vendedor = v.id_vendedor
            LEFT JOIN itens_pedido ip ON p.id_pedido = ip.id_pedido
            LEFT JOIN produto pr ON ip.id_produto = pr.id_produto
            ORDER BY p.data DESC";

        $resu = mysqli_query($con, $query);

        if ($resu) {
            echo "<div class='container'>";

            echo "<table class='table table-bordered table-hover'>";
            echo "<thead class='thead-dark'>";
            echo "<tr>";
            echo "<th class='align-middle text-center'>ID Pedido</th>";
            echo "<th class='align-middle text-center'>Data</th>";
            echo "<th class='align-middle text-center'>Cliente</th>";
            echo "<th class='align-middle text-center'>Vendedor</th>";
            echo "<th class='align-middle text-center'>Forma de Pagamento</th>";
            echo "<th class='align-middle text-center'>Observação</th>";
            echo "<th class='align-middle text-center'>Prazo de Entrega</th>";
            echo "<th class='align-middle text-center'>Itens do Pedido</th>";
            echo "<th class='align-middle text-center'>Excluir</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody class='align-content-center'>";

            
            $currentPedido = null;
            $pedidoId = null;
            $pedidoItens = [];
            
            while ($reg = mysqli_fetch_assoc($resu)) {

                if ($currentPedido !== $reg['id_pedido']) {
                    
                    if ($currentPedido !== null) {
                        echo "<td class='align-middle text-center'>";
                        foreach ($pedidoItens as $item) {
                            echo "- {$item['produto_nome']} ({$item['item_quantidade']}x) - R$ {$item['produto_preco']}<br>";
                        }
                        echo "</td>";
                        echo "<td class='align-middle text-center'>";
                        echo "<button class='btn btn-danger btn-excluir' value='{$currentPedido}'>Excluir</button>";
                        echo "</td>";
                        echo "</tr>";
                    }

                    
                    $pedidoItens = [];
                    $currentPedido = $reg['id_pedido'];

                    echo "<tr>";
                    echo "<td class='align-middle text-center'>{$reg['id_pedido']}</td>";
                    echo "<td class='align-middle text-center'>{$reg['data_pedido']}</td>";
                    echo "<td class='align-middle text-center'>{$reg['cliente_nome']} ({$reg['cliente_email']})</td>";
                    echo "<td class='align-middle text-center'>{$reg['vendedor_nome']} ({$reg['vendedor_email']})</td>";
                    echo "<td class='align-middle text-center'>{$reg['forma_pagto']}</td>";
                    echo "<td class='align-middle text-center'>{$reg['observacao']}</td>";
                    echo "<td class='align-middle text-center'>{$reg['prazo_entrega']}</td>";
                }

                
                $pedidoItens[] = [
                    'produto_nome' => $reg['produto_nome'],
                    'item_quantidade' => $reg['item_quantidade'],
                    'produto_preco' => $reg['produto_preco'],
                ];
            }

            
            if ($currentPedido !== null) {
                echo "<td class='align-middle text-center'>";
                foreach ($pedidoItens as $item) {
                    echo "- {$item['produto_nome']} ({$item['item_quantidade']}x) - R$ {$item['produto_preco']}<br>";
                }
                echo "</td>";
                echo "<td class='align-middle text-center'>";
                echo "<button class='btn btn-danger btn-excluir' value='{$currentPedido}'>Excluir</button>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        } else {
            echo "<div class='alert alert-warning'>Nenhum pedido encontrado.</div>";
        }

    ?>

    <h3 class="text-center my-3">Pedidos-Cliente</h3>

    <div class="container">
        <div class="row border p-2">
            <div class="col-sm-12">
                <?php
                    include('../db.php');

                    $query = "SELECT p.id_pedidos_cliente, p.descricao, p.id_pedido, p.id_cliente, c.nome AS nome_cliente
                            FROM pedidos_cliente p
                            JOIN clientes c ON p.id_cliente = c.id_clientes
                            ORDER BY p.id_pedidos_cliente";
                    $resu = mysqli_query($con, $query);

                    while ($reg = mysqli_fetch_array($resu)) {
                        echo "<form action='/projeto-labbd/controllers/pedidos-cliente-controller.php' method='POST'>";
                        echo "<input type='hidden' name='id_pedidos_cliente' value='" . $reg['id_pedidos_cliente'] . "'>";

                        echo "<div class='row'>";
                        echo "<div class='col-sm-4'>Descrição: <input type='text' maxlength='50' name='descricao' value='" . $reg['descricao'] . "' class='form-control'></div>";
                        echo "<div class='col-sm-4'>ID Pedido: <input type='text' name='id_pedido' value='" . $reg['id_pedido'] . "' class='form-control' readonly></div>";
                        echo "<div class='col-sm-4'>Cliente: <input type='text' value='" . $reg['nome_cliente'] . "' class='form-control' readonly></div>";
                        echo "<input type='hidden' name='id_cliente' value='" . $reg['id_cliente'] . "'>";
                        echo "</div>";

                        echo "<input type='hidden' name='action' value='update'>";

                        echo "<div class='row mt-2'>";
                        echo "<div class='col-sm-4'>";
                        echo "<button class='btn btn-warning' type='submit'>Alterar</button>";
                        echo "</div>";

                        echo "<div class='col-sm-4'>";
                        echo "<form action='/projeto-labbd/controllers/pedidos-cliente-controller.php' method='POST'>";
                        echo "<input type='hidden' name='id_pedidos_cliente' value='" . $reg['id_pedidos_cliente'] . "'>";
                        echo "<button class='btn btn-danger mt-2' type='submit' name='action' value='delete'>Deletar</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";

                        echo "</form>";

                        echo "<hr>";
                    }
                ?>
            </div>
        </div>
    </div>




</body>


<script>

        $(".btn-excluir").on("click", function() {
            
            if (!confirm("Tem certeza que deseja excluir este pedido?")) {
                return;
            }

            var idPedido = $(this).val();

            
            $.ajax({
                url: "/projeto-labbd/controllers/pedido-controller.php",
                method: "POST",
                data: { action: "delete", id_pedido: idPedido },
                success: function(response) {

                    alert(response)

                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error("Erro na exclusão:", error);
                    alert("Ocorreu um erro ao excluir o pedido. Tente novamente.");
                }
            });
        });




        $('#addProduto').click(function() {
            var produtoId = $('#produto').val();
            var produtoNome = $('#produto option:selected').text();
            var produtoQtde = $('#qtdeBd' + produtoId).val();
            var produtoQtdeSelecionada = $('#produtoQtde').val();

            if (produtoId != "") {

                if((parseInt(produtoQtdeSelecionada) > parseInt(produtoQtde)) || !parseInt(produtoQtdeSelecionada)){
                    alert('Quantidade escolhida Inválida!');
                } else{

                    var itemExistente = $('#listaProdutos #item' + produtoId);

                    if (itemExistente.length > 0) {
                        
                        var qtdeAtual = parseInt(itemExistente.find('input[name="produtos[' + produtoId + '][quantidade]"]').val());
                        var qtdeTotal = qtdeAtual + parseInt(produtoQtdeSelecionada);

                        if (qtdeTotal > parseInt(produtoQtde)) {
                            alert('Quantidade Inválida!');
                        } else {
                            
                            itemExistente.find('input[name="produtos[' + produtoId + '][quantidade]"]').val(qtdeTotal);
                            itemExistente.find('span').text('Nome: ' + produtoNome + ' - Quantidade: ' + qtdeTotal);
                        }

                    } else{
                        var itemHtml = '<div class="produto-item d-flex my-2 p-2 border shadow-sm align-content-center w-50" id="item' + produtoId + '">' +
                                '<input id="produtoNome' + produtoId + '" name="produtos[' + produtoId + '][nome]" value="' + produtoNome + '" hidden>' +
                                '<input id="Qtde' + produtoId + '" name="produtos[' + produtoId + '][quantidade]" type="number" value="' + produtoQtdeSelecionada + '" hidden>' +
                                '<span class="align-content-center">Nome: ' + produtoNome + ' - Quantidade: ' + produtoQtdeSelecionada + '</span>' +
                                '<div class="d-flex flex-fill justify-content-end">'+
                                '<button type="button" class="removeProduto btn btn-danger text-right">Remover</button>' +
                                '</div>'+
                                '</div>';

                        $('#listaProdutos').append(itemHtml);
                    }
                    
                }

            } else {
                alert("Selecione um produto primeiro!");
            }
        });

        $('#listaProdutos').on('click', '.removeProduto', function() {
            $(this).parent().parent().remove();
        });

</script>


</html>
