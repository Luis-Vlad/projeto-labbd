<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Projeto Lab. Banco de Dados - Consulta Pedidos e Itens Vendidos</title>
</head>
<body>

    <?php
        include ('../db.php');

        $nome_cliente = isset($_POST['nome_cliente']) ? trim($_POST['nome_cliente']) : '';
        $numero_pedido = isset($_POST['numero_pedido']) ? trim($_POST['numero_pedido']) : '';

        $query = "SELECT pedidos.id_pedido, 
                        pedidos.data, 
                        clientes.nome AS cliente_nome, 
                        vendedor.nome AS vendedor_nome, 
                        produto.id_produto AS produto_codigo, 
                        produto.nome AS produto_nome, 
                        produto.preco AS produto_preco, 
                        itens_pedido.qtde AS quantidade_comprada
                FROM itens_pedido
                JOIN pedidos ON itens_pedido.id_pedido = pedidos.id_pedido
                JOIN clientes ON pedidos.id_cliente = clientes.id_clientes
                JOIN vendedor ON pedidos.id_vendedor = vendedor.id_vendedor
                JOIN produto ON itens_pedido.id_produto = produto.id_produto
                WHERE 1=1";

        if (!empty($nome_cliente)) {
            $query .= " AND clientes.nome LIKE '%" . mysqli_real_escape_string($con, $nome_cliente) . "%'";
        }

        if (!empty($numero_pedido)) {
            $query .= " AND pedidos.id_pedido = '" . mysqli_real_escape_string($con, $numero_pedido) . "'";
        }

        $resu = mysqli_query($con, $query);
    ?>


    <h1 class="text-center bg-primary text-white mb-5">Consulta - Pedidos e Itens Vendidos</h1>

    <div class="container">
        <form class="row" method="POST">
            <div class="col-12 text-center">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="nome_cliente">Nome do Cliente:</label>
                        </div>
                        <div class="d-flex">
                            <input type="text" name="nome_cliente" id="nome_cliente" class="form-control" maxlength="50" value="<?php echo $nome_cliente; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="numero_pedido">Número do Pedido:</label>
                        </div>
                        <div class="d-flex">
                            <input type="text" name="numero_pedido" id="numero_pedido" class="form-control" value="<?php echo $numero_pedido; ?>">
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
                        <th class="text-center align-middle">Número do Pedido</th>
                        <th class="text-center align-middle">Data</th>
                        <th class="text-center align-middle">Cliente</th>
                        <th class="text-center align-middle">Vendedor</th>
                        <th class="text-center align-middle">Código do Produto</th>
                        <th class="text-center align-middle">Nome do Produto</th>
                        <th class="text-center align-middle">Preço</th>
                        <th class="text-center align-middle">Quantidade Comprada</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($reg = mysqli_fetch_assoc($resu)): ?>
                        <tr>
                            <td class="text-center align-middle"><?php echo $reg['id_pedido']; ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($reg['data']); ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($reg['cliente_nome']); ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($reg['vendedor_nome']); ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($reg['produto_codigo']); ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($reg['produto_nome']); ?></td>
                            <td class="text-center align-middle"><?php echo number_format($reg['produto_preco'], 2, ',', '.'); ?></td>
                            <td class="text-center align-middle"><?php echo $reg['quantidade_comprada']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="alert alert-warning mt-3">Nenhum pedido ou item encontrado.</div>
        <?php endif; ?>
    </div>

</body>
</html>
