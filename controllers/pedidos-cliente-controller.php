<?php
    include('../db.php');

    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'update') {

            $id_pedidos_cliente = isset($_POST['id_pedidos_cliente']) ? $_POST['id_pedidos_cliente'] : '';
            $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
            $id_pedido = isset($_POST['id_pedido']) ? $_POST['id_pedido'] : '';
            $id_cliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : '';

            if (empty($id_pedidos_cliente) || empty($id_pedido) || empty($id_cliente)) {
                echo "<br><font color='red'>Campos obrigatórios não preenchidos!</font>";
                exit;
            }

            $query = "UPDATE pedidos_cliente 
                      SET descricao = '$descricao', id_pedido = $id_pedido, id_cliente = $id_cliente
                      WHERE id_pedidos_cliente = $id_pedidos_cliente";

            if (mysqli_query($con, $query)) {
                echo "<br><font color='green'>Pedidos-Cliente atualizados com sucesso!</font>";
                echo "<br><a href='/projeto-labbd/views/pedido.php'><button class='btn btn-secondary rounded-pill'>Voltar</button></a>";
            } else {
                echo "<br><font color='red'>Erro ao atualizar os dados: " . mysqli_error($con) . "</font>";
            }
        }

        if ($action === 'delete') {

            $id_pedidos_cliente = isset($_POST['id_pedidos_cliente']) ? $_POST['id_pedidos_cliente'] : '';

            if (empty($id_pedidos_cliente)) {
                echo "<br><font color='red'>ID do pedido cliente não informado!</font>";
                exit;
            }

            $query = "DELETE FROM pedidos_cliente WHERE id_pedidos_cliente = $id_pedidos_cliente";

            if (mysqli_query($con, $query)) {
                echo "<br><font color='green'>Pedidos-Cliente excluído com sucesso!</font>";
                echo "<br><a href='/projeto-labbd/views/pedido.php'><button class='btn btn-secondary rounded-pill'>Voltar</button></a>";
            } else {
                echo "<br><font color='red'>Erro ao excluir os dados: " . mysqli_error($con) . "</font>";
            }
        }
    }
?>
