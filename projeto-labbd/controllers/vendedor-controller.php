<?php
    include('../db.php');

    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        
        if ($action === 'create') {
            
            $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
            $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
            $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
            $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
            $celular = isset($_POST['celular']) ? $_POST['celular'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $perc_comissao = isset($_POST['perc_comissao']) ? $_POST['perc_comissao'] : '';
            $salario = isset($_POST['salario']) ? $_POST['salario'] : '';
            $inicio_atividade = isset($_POST['inicio_atividade']) ? $_POST['inicio_atividade'] : '';

            
            $query = "INSERT INTO vendedor (nome, endereco, cidade, estado, celular, email, perc_comissao, salario, inicio_atividade) 
                VALUES ('$nome', '$endereco', '$cidade', '$estado', '$celular', '$email', '$perc_comissao', '$salario', '$inicio_atividade')";

            
            if (mysqli_query($con, $query)) {
                echo "<br><font color='green'>Vendedor cadastrado com sucesso!</font>";
                echo "<br><a href='/projeto-labbd/views/vendedor.php'><button class='btn btn-secondary rounded-pill'>Voltar</button></a>";
            } else {
                echo "<br><font color='red'>Erro ao cadastrar o Vendedor: " . mysqli_error($con) . "</font>";
            }
        }

        
        if ($action === 'update') {
            
            $id_vendedor = isset($_POST['id_vendedor']) ? $_POST['id_vendedor'] : '';

            
            $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
            $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
            $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
            $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
            $celular = isset($_POST['celular']) ? $_POST['celular'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $perc_comissao = isset($_POST['perc_comissao']) ? $_POST['perc_comissao'] : '';
            $salario = isset($_POST['salario']) ? $_POST['salario'] : '';
            $inicio_atividade = isset($_POST['inicio_atividade']) ? $_POST['inicio_atividade'] : '';


            
            $update_query = "UPDATE vendedor SET 
                nome = '$nome', endereco = '$endereco', cidade = '$cidade', estado = '$estado', celular = '$celular', email = '$email', perc_comissao = '$perc_comissao',
                salario = '$salario', inicio_atividade = '$inicio_atividade'
                WHERE id_vendedor = '$id_vendedor'";
            
            if (mysqli_query($con, $update_query)) {
                echo "<br><font color='green'>Vendedor atualizado com sucesso!</font>";
                echo "<br><a href='/projeto-labbd/views/vendedor.php'><button class='btn btn-secondary rounded-pill'>Voltar</button></a>";
            } else {
                echo "<br><font color='red'>Erro ao atualizar o Vendedor: " . mysqli_error($con) . "</font>";
            }
        }

        if ($action === 'delete') {
            $id_vendedor = isset($_POST['id_vendedor']) ? $_POST['id_vendedor'] : '';
            $delete_query = "DELETE FROM vendedor WHERE id_vendedor = '$id_vendedor'";
            
            if (mysqli_query($con, $delete_query)) {
                echo "<br><font color='green'>Vendedor deletado com sucesso!</font>";
                echo "<br><a href='/projeto-labbd/views/vendedor.php'><button class='btn btn-secondary rounded-pill'>Voltar</button></a>";
            } else {
                echo "<br><font color='red'>Erro ao deletar o Vendedor: " . mysqli_error($con) . "</font>";
            }
        }
    }
?>
