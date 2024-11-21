<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Projeto Lab. Banco de Dados - Consulta Pedidos</title>
</head>
<body>

    <?php
        include ('../db.php');

        $data_inicio = isset($_POST['data_inicio']) ? trim($_POST['data_inicio']) : '';
        $data_fim = isset($_POST['data_fim']) ? trim($_POST['data_fim']) : '';

        $query = "SELECT pedidos.*, 
                clientes.nome AS cliente_nome, 
                vendedor.nome AS vendedor_nome, 
                forma_pagto.nome AS forma_pagto_nome
                FROM pedidos
                JOIN clientes ON pedidos.id_cliente = clientes.id_clientes
                JOIN vendedor ON pedidos.id_vendedor = vendedor.id_vendedor
                JOIN forma_pagto ON pedidos.id_forma_pagto = forma_pagto.id_forma_pagto
                WHERE 1=1";


        if (!empty($data_inicio) && !empty($data_fim)) {
            $query .= " AND pedidos.data BETWEEN '" . mysqli_real_escape_string($con, $data_inicio) . "' AND '" . mysqli_real_escape_string($con, $data_fim) . "'";
        } elseif (!empty($data_inicio)) {
            $query .= " AND pedidos.data >= '" . mysqli_real_escape_string($con, $data_inicio) . "'";
        } elseif (!empty($data_fim)) {
            $query .= " AND pedidos.data <= '" . mysqli_real_escape_string($con, $data_fim) . "'";
        }

        $resu = mysqli_query($con, $query);
    ?>

    <h1 class="text-center bg-primary text-white mb-5">Consulta - Pedidos</h1>

    <div class="container">

        <form class="row" method="POST">
            <div class="col-12 text-center">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="data_inicio">Data Início:</label>
                        </div>
                        <div class="d-flex">
                            <input type="date" name="data_inicio" id="data_inicio" class="form-control" value="<?php echo $data_inicio; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="data_fim">Data Fim:</label>
                        </div>
                        <div class="d-flex">
                            <input type="date" name="data_fim" id="data_fim" class="form-control" value="<?php echo $data_fim; ?>">
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <a href="/projeto-labbd/index.php" class="btn btn-secondary rounded mr-2">Voltar</a>
                    <button class="btn btn-success rounded ml-2" type="submit">Consultar</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container d-flex justify-content-center align-items-center mt-4">
        <?php if (isset($resu) && mysqli_num_rows($resu) > 0): ?>
            <table class="table table-bordered table-hover justify-content-center mt-4">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center align-middle">ID Pedido</th>
                        <th class="text-center align-middle">Data</th>
                        <th class="text-center align-middle">Cliente</th>
                        <th class="text-center align-middle">Vendedor</th>
                        <th class="text-center align-middle">Observação</th>
                        <th class="text-center align-middle">Forma de Pagamento</th>
                        <th class="text-center align-middle">Prazo de Entrega</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($reg = mysqli_fetch_assoc($resu)): ?>
                        <tr>
                            <td class="text-center align-middle"><?php echo $reg['id_pedido']; ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($reg['data']); ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($reg['cliente_nome']); ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($reg['vendedor_nome']); ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($reg['observacao']); ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($reg['forma_pagto_nome']); ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($reg['prazo_entrega']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="alert alert-warning mt-3">Nenhum pedido encontrado.</div>
        <?php endif; ?>
    </div>
    
    <div class="d-flex justify-content-center">
        <h3 class="text-center mb-2 mt-3">Pedidos - Cliente</h1>
    </div>
    

    <?php
        include ('../db.php');

        $query = "SELECT pedidos_cliente.*, 
                         pedidos.data AS pedido_data,
                         pedidos.observacao AS pedido_observacao,
                         clientes.nome AS cliente_nome
                  FROM pedidos_cliente
                  JOIN pedidos ON pedidos_cliente.id_pedido = pedidos.id_pedido
                  JOIN clientes ON pedidos_cliente.id_cliente = clientes.id_clientes
                  WHERE 1=1";

        $resu = mysqli_query($con, $query);
    ?>

    <div class="container d-flex justify-content-center align-items-center mt-4">
        <?php if (isset($resu) && mysqli_num_rows($resu) > 0): ?>
            <table class="table table-bordered table-hover justify-content-center mt-4">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center align-middle">ID Pedido Cliente</th>
                        <th class="text-center align-middle">Descrição</th>
                        <th class="text-center align-middle">Data Pedido</th>
                        <th class="text-center align-middle">Observação Pedido</th>
                        <th class="text-center align-middle">Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($reg = mysqli_fetch_assoc($resu)): ?>
                        <tr>
                            <td class="text-center align-middle"><?php echo $reg['id_pedidos_cliente']; ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($reg['descricao']); ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($reg['pedido_data']); ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($reg['pedido_observacao']); ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($reg['cliente_nome']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="alert alert-warning mt-3">Nenhum pedido cliente encontrado.</div>
        <?php endif; ?>
    </div>

</body>
</html>
