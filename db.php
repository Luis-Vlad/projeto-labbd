<?php
    $servidor = 'localhost';
    $usuario = 'root';
    $senha='';
    $db = 'projeto-labbd';
    $con = mysqli_connect($servidor,$usuario,$senha,$db);
    if(!$con){
        print("Erro na conexão com o Banco de Dados");
        print("Erro: ".mysqli_connect_error());
        exit;
    }
?>
