<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Lab Banco de Dados - Relatório Comissão</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1 class="text-center bg-primary text-white mb-5">Relatório - Comissão Vendedores</h1>
    <div class="container">

        <form class="row" method="POST" action="/projeto-labbd/controllers/comissao-vendedores-relatorio-controller.php">
            <div class="col-12 text-center">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="data_inicio" class="form-label">Data Início</label>
                        </div>
                        <div class="d-flex">
                            <input type="date" id="data_inicio" name="data_inicio" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="data_final" class="form-label">Data Final</label>
                        </div>
                        <div class="d-flex">
                            <input type="date" id="data_final" name="data_final" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <a href="/projeto-labbd/index.php" class="btn btn-secondary rounded mr-2">Voltar</a>
                    <button type="submit" name="action" value="gerar_relatorio" class="btn btn-success">Gerar Relatório</button>
                </div>
            </div>
        </form>

    </div>
</body>
</html>
