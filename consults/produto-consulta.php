<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Projeto Lab. Banco de Dados - Consulta Produtos</title>
</head>
<body>

    <?php
        include ('../db.php');

        $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
        $preco = isset($_POST['preco']) ? trim($_POST['preco']) : '';

        $query = "SELECT * FROM produto WHERE 1=1";

        if (!empty($nome)) {
            $query .= " AND nome LIKE '%" . mysqli_real_escape_string($con, $nome) . "%'";
        }
        if (!empty($preco)) {
            $query .= " AND preco <= " . floatval($preco);
        }

        $resu = mysqli_query($con, $query);
    ?>

    <h1 class="text-center bg-primary text-white mb-5">Consulta - Produtos</h1>

    <div class="container">
        <form class="row" method="POST">
            <div class="col-12 text-center">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="nome">Nome:</label>
                        </div>
                        <div class="d-flex">
                            <input type="text" name="nome" value="<?php echo $nome; ?>" id="nome" class="form-control" maxlength="50">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="preco">Preço:</label>
                        </div>
                        <div class="d-flex">
                            <input type="number" step="0.5" value="<?php echo $preco; ?>" name="preco" id="preco" class="form-control">
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
                        <th class="text-center align-middle">ID</th>
                        <th class="text-center align-middle">Nome</th>
                        <th class="text-center align-middle">Quantidade Estoque</th>
                        <th class="text-center align-middle">Preço</th>
                        <th class="text-center align-middle">Unidade de Medida</th>
                        <th class="text-center align-middle">Promoção</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                        while ($reg = mysqli_fetch_assoc($resu)): 
                    
                            $option = $reg['promocao'];
                            if($option === 'S' || $option === 's'){
                                $option = 'S';
                            }

                    ?>
                        <tr>
                            <td class="text-center align-middle"><?php echo $reg['id_produto']; ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($reg['nome']); ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($reg['qtde_estoque']); ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($reg['preco']); ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($reg['unidade_medida']); ?></td>
                            <td class="text-center align-middle">
                                <?php echo htmlspecialchars($option === 'S' ? 'Sim' : 'Não'); ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="alert alert-warning mt-3">Nenhum produto encontrado.</div>
        <?php endif; ?>
    </div>

</body>
</html>
