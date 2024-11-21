<?php
    include('../db.php');

    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        
        if ($action === 'create') {
            
            $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
            $qtde_estoque = isset($_POST['qtde_estoque']) ? $_POST['qtde_estoque'] : '';
            $preco = isset($_POST['preco']) ? $_POST['preco'] : '';
            $unidade_medida = isset($_POST['unidade_medida']) ? $_POST['unidade_medida'] : '';
            $promocao = isset($_POST['promocao']) ? $_POST['promocao'] : '';

            
            $query = "INSERT INTO produto (nome, qtde_estoque, preco, unidade_medida, promocao) 
                    VALUES ('$nome', '$qtde_estoque', '$preco', '$unidade_medida', '$promocao')";
            
            if (mysqli_query($con, $query)) {
                echo "<br><font color='green'>Produto cadastrado com sucesso!</font>";
                echo "<br><a href='/projeto-labbd/views/produto.php'><button class='btn btn-secondary rounded-pill'>Voltar</button></a>";
            } else {
                echo "<br><font color='red'>Erro ao cadastrar o produto: " . mysqli_error($con) . "</font>";
            }
        }

        
        if ($action === 'update') {
            
            $id_produto = isset($_POST['id_produto']) ? $_POST['id_produto'] : '';

            
            $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
            $qtde_estoque = isset($_POST['qtde_estoque']) ? $_POST['qtde_estoque'] : '';
            $preco = isset($_POST['preco']) ? $_POST['preco'] : '';
            $unidade_medida = isset($_POST['unidade_medida']) ? $_POST['unidade_medida'] : '';
            $promocao = isset($_POST['promocao']) ? $_POST['promocao'] : '';


            
            $update_query = "UPDATE produto SET 
                nome = '$nome', 
                qtde_estoque = '$qtde_estoque', 
                preco = '$preco',
                unidade_medida = '$unidade_medida', 
                promocao = '$promocao'
                WHERE id_produto = '$id_produto'";
            
            if (mysqli_query($con, $update_query)) {
                echo "<br><font color='green'>Produto atualizado com sucesso!</font>";
                echo "<br><a href='/projeto-labbd/views/produto.php'><button class='btn btn-secondary rounded-pill'>Voltar</button></a>";
            } else {
                echo "<br><font color='red'>Erro ao atualizar o produto: " . mysqli_error($con) . "</font>";
            }
        }

        if ($action === 'delete') {
            $id_produto = isset($_POST['id_produto']) ? $_POST['id_produto'] : '';
            $delete_query = "DELETE FROM produto WHERE id_produto = '$id_produto'";
            
            if (mysqli_query($con, $delete_query)) {
                echo "<br><font color='green'>Produto deletado com sucesso!</font>";
                echo "<br><a href='/projeto-labbd/views/produto.php'><button class='btn btn-secondary rounded-pill'>Voltar</button></a>";
            } else {
                echo "<br><font color='red'>Erro ao deletar o produto: " . mysqli_error($con) . "</font>";
            }
        }
    }
?>
