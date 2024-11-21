<?php
include('../db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    
    if ($action === 'create') {
        
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
        $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
        $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
        $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
        $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $cpf_cnpj = isset($_POST['cpf_cnpj']) ? $_POST['cpf_cnpj'] : '';
        $rg = isset($_POST['rg']) ? $_POST['rg'] : '';
        $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
        $celular = isset($_POST['celular']) ? $_POST['celular'] : '';
        $data_nasc = isset($_POST['data_nasc']) ? $_POST['data_nasc'] : '';
        $salario = isset($_POST['salario']) ? $_POST['salario'] : '';
        $idade = isset($_POST['idade']) ? $_POST['idade'] : '';
        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';

        
        $query = "INSERT INTO clientes (nome, endereco, numero, bairro, cidade, estado, email, cpf_cnpj, rg, telefone, celular, data_nasc, salario, idade, tipo) 
                  VALUES ('$nome', '$endereco', '$numero', '$bairro', '$cidade', '$estado', '$email', '$cpf_cnpj', '$rg', '$telefone', '$celular', '$data_nasc', '$salario', '$idade', '$tipo')";
        
        if (mysqli_query($con, $query)) {
            echo "<br><font color='green'>Cliente cadastrado com sucesso!</font>";
            echo "<br><a href='/projeto-labbd/views/clientes.php'><button class='btn btn-secondary rounded-pill'>Voltar</button></a>";
        } else {
            echo "<br><font color='red'>Erro ao cadastrar cliente: " . mysqli_error($con) . "</font>";
        }
    }

    
    if ($action === 'update') {
        
        $id_clientes = isset($_POST['id_clientes']) ? $_POST['id_clientes'] : '';

        
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
        $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
        $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
        $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
        $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $cpf_cnpj = isset($_POST['cpf_cnpj']) ? $_POST['cpf_cnpj'] : '';
        $rg = isset($_POST['rg']) ? $_POST['rg'] : '';
        $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
        $celular = isset($_POST['celular']) ? $_POST['celular'] : '';
        $data_nasc = isset($_POST['data_nasc']) ? $_POST['data_nasc'] : '';
        $salario = isset($_POST['salario']) ? $_POST['salario'] : '';
        $idade = isset($_POST['idade']) ? $_POST['idade'] : '';
        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';


        
        $update_query = "UPDATE clientes SET 
            nome = '$nome', 
            numero = '$numero', 
            endereco = '$endereco',
            bairro = '$bairro', 
            cidade = '$cidade', 
            estado = '$estado', 
            email = '$email', 
            cpf_cnpj = '$cpf_cnpj', 
            rg = '$rg', 
            telefone = '$telefone', 
            celular = '$celular', 
            data_nasc = '$data_nasc', 
            salario = '$salario', 
            idade = '$idade', 
            tipo = '$tipo' 
        WHERE id_clientes = '$id_clientes'";
        
        if (mysqli_query($con, $update_query)) {
            echo "<br><font color='green'>Cliente atualizado com sucesso!</font>";
            echo "<br><a href='/projeto-labbd/views/clientes.php'><button class='btn btn-secondary rounded-pill'>Voltar</button></a>";
        } else {
            echo "<br><font color='red'>Erro ao atualizar cliente: " . mysqli_error($con) . "</font>";
        }
    }

    
    if ($action === 'delete') {
        $id_clientes = isset($_POST['id_clientes']) ? $_POST['id_clientes'] : '';
        $delete_query = "DELETE FROM clientes WHERE id_clientes = '$id_clientes'";
        
        if (mysqli_query($con, $delete_query)) {
            echo "<br><font color='green'>Cliente deletado com sucesso!</font>";
            echo "<br><a href='/projeto-labbd/views/clientes.php'><button class='btn btn-secondary rounded-pill'>Voltar</button></a>";
        } else {
            echo "<br><font color='red'>Erro ao deletar cliente: " . mysqli_error($con) . "</font>";
        }
    }
}
?>
