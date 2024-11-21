<?php
    include('../db.php');

    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        
        if ($action === 'create') {
    
            $data = isset($_POST['data']) ? $_POST['data'] : '';
            $observacao = isset($_POST['observacao']) ? $_POST['observacao'] : '';
            $prazo_entrega = isset($_POST['prazo_entrega']) ? $_POST['prazo_entrega'] : '';
            $id_cliente  = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : '';
            $id_forma_pagto  = isset($_POST['id_forma_pagto']) ? $_POST['id_forma_pagto'] : '';
            $id_vendedor  = isset($_POST['id_vendedor']) ? $_POST['id_vendedor'] : '';
        
            $descricao  = isset($_POST['descricao']) ? $_POST['descricao'] : '';
        
            $query = "INSERT INTO pedidos (data, observacao, prazo_entrega, id_cliente, id_forma_pagto, id_vendedor) 
                      VALUES ('$data', '$observacao', '$prazo_entrega', '$id_cliente', '$id_forma_pagto', '$id_vendedor')";
        
            if (mysqli_query($con, $query)) {
                
                $id_pedido = mysqli_insert_id($con);
        
                $queryCliente = "INSERT INTO pedidos_cliente (descricao, id_pedido, id_cliente) 
                                 VALUES ('$descricao', $id_pedido, $id_cliente)";
        
                if (!mysqli_query($con, $queryCliente)) {
                    echo "<br><font color='red'>Erro ao cadastrar na tabela pedidos_cliente: " . mysqli_error($con) . "</font>";
                }
        
                if (isset($_POST['produtos']) && is_array($_POST['produtos'])) {
        
                    foreach ($_POST['produtos'] as $produtoId => $produto) {
        
                        $qtde = isset($produto['quantidade']) ? intval($produto['quantidade']) : 0;
                        $queryItem = "INSERT INTO itens_pedido (qtde, id_produto, id_pedido) 
                                      VALUES ($qtde, $produtoId, $id_pedido)";
        
                        if (!mysqli_query($con, $queryItem)) {
                            echo "<br><font color='red'>Erro ao cadastrar o item $produtoId: " . mysqli_error($con) . "</font>";
                            continue;
                        }
        
                        $queryUpdateEstoque = "UPDATE produto 
                                               SET qtde_estoque = qtde_estoque - $qtde 
                                               WHERE id_produto = $produtoId AND qtde_estoque >= $qtde";
        
                        if (!mysqli_query($con, $queryUpdateEstoque)) {
                            echo "<br><font color='red'>Erro ao atualizar estoque do produto $produtoId: " . mysqli_error($con) . "</font>";
                        }
        
                    }
        
                    echo "<br><font color='green'>Pedido e itens cadastrados com sucesso!</font>";
                    echo "<br><a href='/projeto-labbd/views/pedido.php'><button class='btn btn-secondary rounded-pill'>Voltar</button></a>";
        
                } else {
                    echo "<br><font color='red'>Itens não encontrados: " . $_POST['produtos'] . " </font>";
                    echo "<br><a href='/projeto-labbd/views/pedido.php'><button class='btn btn-secondary rounded-pill'>Voltar</button></a>";
                }
        
            } else {
                echo "<br><font color='red'>Erro ao cadastrar o Pedido: " . mysqli_error($con) . "</font>";
            }
        
        }
        

        

        if ($action === 'delete') {

            $id_pedido = intval($_POST['id_pedido']);

            mysqli_begin_transaction($con);

            try {
                
                $queryItens = "DELETE FROM itens_pedido WHERE id_pedido = $id_pedido";
                if (!mysqli_query($con, $queryItens)) {
                    echo "Erro ao excluir itens do pedido: " . mysqli_error($con);
                }
        
                
                $queryPedido = "DELETE FROM pedidos WHERE id_pedido = $id_pedido";
                if (!mysqli_query($con, $queryPedido)) {
                    echo"Erro ao excluir pedido: " . mysqli_error($con);
                }
        
                mysqli_commit($con);
        
                echo "Pedido excluído com sucesso.";

            } catch (Exception $e) {
                
                mysqli_rollback($con);
        
                echo "Erro" . $e->getMessage();

            }

            exit;
        }
    }
?>
