<?php
    include('../db.php');

    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        
        if ($action === 'create') {
            
            $nome = isset($_POST['nome']) ? $_POST['nome'] : '';

            
            $query = "INSERT INTO forma_pagto (nome) 
                    VALUES ('$nome')";
            
            if (mysqli_query($con, $query)) {
                echo "<br><font color='green'>Forma de Pagamento cadastrada com sucesso!</font>";
                echo "<br><a href='/projeto-labbd/views/forma-pagamento.php'><button class='btn btn-secondary rounded-pill'>Voltar</button></a>";
            } else {
                echo "<br><font color='red'>Erro ao cadastrar a Forma de Pagamento: " . mysqli_error($con) . "</font>";
            }
        }

        
        if ($action === 'update') {
            
            $id_forma_pagto = isset($_POST['id_forma_pagto']) ? $_POST['id_forma_pagto'] : '';

            
            $nome = isset($_POST['nome']) ? $_POST['nome'] : '';


            
            $update_query = "UPDATE forma_pagto SET 
                nome = '$nome'
                WHERE id_forma_pagto = '$id_forma_pagto'";
            
            if (mysqli_query($con, $update_query)) {
                echo "<br><font color='green'>Forma de Pagamento atualizado com sucesso!</font>";
                echo "<br><a href='/projeto-labbd/views/forma-pagamento.php'><button class='btn btn-secondary rounded-pill'>Voltar</button></a>";
            } else {
                echo "<br><font color='red'>Erro ao atualizar o Forma de Pagamento: " . mysqli_error($con) . "</font>";
            }
        }

        if ($action === 'delete') {
            $id_forma_pagto = isset($_POST['id_forma_pagto']) ? $_POST['id_forma_pagto'] : '';
            $delete_query = "DELETE FROM forma_pagto WHERE id_forma_pagto = '$id_forma_pagto'";
            
            if (mysqli_query($con, $delete_query)) {
                echo "<br><font color='green'>Forma de Pagamento deletado com sucesso!</font>";
                echo "<br><a href='/projeto-labbd/views/forma-pagamento.php'><button class='btn btn-secondary rounded-pill'>Voltar</button></a>";
            } else {
                echo "<br><font color='red'>Erro ao deletar o Forma de Pagamento: " . mysqli_error($con) . "</font>";
            }
        }
    }
?>
