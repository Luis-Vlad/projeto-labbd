<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Projeto Lab. Banco de Dados</title>
</head>
<body>

<style>
    .btn-200{
        width: 200px;
    }
</style>

    <div class="container-fluid">
        <div class="row bg-dark text-white mb-2">
            <div class="col-sm-12 text-center">
                <h1>Início</h1>
            </div>
        </div>

        <h3 class="text-center">Cadastros:</h3>

        <div class="d-flex justify-content-around mt-4 mb-4">
                <a class="btn btn-success rounded btn-200" href="views/clientes.php">Clientes</a>
                <a class="btn btn-success rounded btn-200" href="views/produto.php">Produto</a>
                <a class="btn btn-success rounded btn-200" href="views/pedido.php">Pedido</a>
                <a class="btn btn-success rounded btn-200" href="views/vendedor.php">Vendedor</a>
                <a class="btn btn-success rounded btn-200" href="views/forma-pagamento.php">Forma de Pagamento</a>
        </div>

        <hr>

        <div class="d-flex justify-content-center">
            <h3>Consultas: </h3>
        </div>

        <div class="d-flex justify-content-around mt-4 mb-4">
                <a class="btn btn-primary rounded btn-200" href="consults/clientes-consulta.php">Clientes</a>
                <a class="btn btn-primary rounded btn-200" href="consults/produto-consulta.php">Produto</a>
                <a class="btn btn-primary rounded btn-200" href="consults/pedido-consulta.php">Pedido</a>
                <a class="btn btn-primary rounded btn-200" href="consults/pedidos-itens-consulta.php">Pedidos e Itens Vendidos</a>
        </div>

        <hr>

        <div class="d-flex justify-content-center">
            <h3>Relatórios: </h3>
        </div>

        

    </div>
    
</body>
</html>