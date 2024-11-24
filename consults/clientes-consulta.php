<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Projeto Lab. Banco de Dados - Consulta Clientes</title>
</head>
<body>


    <?php
        include ('../db.php');

        $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
        $endereco = isset($_POST['endereco']) ? trim($_POST['endereco']) : '';
        $cidade = isset($_POST['cidade']) ? trim($_POST['cidade']) : '';

        $query = "SELECT * FROM clientes WHERE 1=1";

        if (!empty($nome)) {
            $query .= " AND nome LIKE '%" . mysqli_real_escape_string($con, $nome) . "%'";
        }
        if (!empty($endereco)) {
            $query .= " AND endereco LIKE '%" . mysqli_real_escape_string($con, $endereco) . "%'";
        }
        if (!empty($cidade)) {
            $query .= " AND cidade LIKE '%" . mysqli_real_escape_string($con, $cidade) . "%'";
        }

        $resu = mysqli_query($con, $query);
    ?>


    <h1 class="text-center bg-primary text-white mb-5">Consulta - Clientes</h1>

    <div class="container">
        
        <form class="row" method="POST">
            <div class="col-12 text-center">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="nome">Nome:</label>
                        </div>
                        <div class="d-flex">
                            <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>" class="form-control" maxlength="50">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="endereco">Endereço:</label>
                        </div>
                        <div class="d-flex">
                            <input type="text" name="endereco" id="endereco" value="<?php echo $endereco; ?>" class="form-control" maxlength="100">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="cidade">Cidade:</label>
                        </div>
                        <div class="d-flex">
                            <input type="text" name="cidade" id="cidade" value="<?php echo $cidade; ?>" class="form-control" maxlength="20">
                        </div>
                    </div>

                </div>

                <input type="hidden" name="action" value="create">

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
                                <th class="text-center align-middle">Endereço</th>
                                <th class="text-center align-middle">Número</th>
                                <th class="text-center align-middle">Bairro</th>
                                <th class="text-center align-middle">Cidade</th>
                                <th class="text-center align-middle">Estado</th>
                                <th class="text-center align-middle">Email</th>
                                <th class="text-center align-middle">CPF/CNPJ</th>
                                <th class="text-center align-middle">RG</th>
                                <th class="text-center align-middle">Telefone</th>
                                <th class="text-center align-middle">Celular</th>
                                <th class="text-center align-middle">Data de Nascimento</th>
                                <th class="text-center align-middle">Salário</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($reg = mysqli_fetch_assoc($resu)): ?>
                                <tr>
                                    <td class="text-center align-middle"><?php echo $reg['id_clientes']; ?></td>
                                    <td class="text-center align-middle"><?php echo htmlspecialchars($reg['nome']); ?></td>
                                    <td class="text-center align-middle"><?php echo htmlspecialchars($reg['endereco']); ?></td>
                                    <td class="text-center align-middle"><?php echo htmlspecialchars($reg['numero']); ?></td>
                                    <td class="text-center align-middle"><?php echo htmlspecialchars($reg['bairro']); ?></td>
                                    <td class="text-center align-middle"><?php echo htmlspecialchars($reg['cidade']); ?></td>
                                    <td class="text-center align-middle"><?php echo htmlspecialchars($reg['estado']); ?></td>
                                    <td class="text-center align-middle"><?php echo htmlspecialchars($reg['email']); ?></td>
                                    <td class="text-center align-middle"><?php echo htmlspecialchars($reg['cpf_cnpj']); ?></td>
                                    <td class="text-center align-middle"><?php echo htmlspecialchars($reg['rg']); ?></td>
                                    <td class="text-center align-middle"><?php echo htmlspecialchars($reg['telefone']); ?></td>
                                    <td class="text-center align-middle"><?php echo htmlspecialchars($reg['celular']); ?></td>
                                    <td class="text-center align-middle"><?php echo htmlspecialchars($reg['data_nasc']); ?></td>
                                    <td class="text-center align-middle"><?php echo htmlspecialchars($reg['salario']); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>

                <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                    <div class="alert alert-warning mt-3">Nenhum cliente encontrado.</div>
                <?php endif; ?>

    </div>

</body>
</html>
