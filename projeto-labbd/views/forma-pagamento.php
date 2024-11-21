<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Projeto Lab. Banco de Dados - Forma de Pagamento</title>
</head>
<body>

    <h1 class="text-center bg-primary text-white mb-5">Forma de Pagamento</h1>

    <div class="container">

        <form class="row" action="/projeto-labbd/controllers/forma-pagamento-controller.php" method="POST">
            <div class="col-12 text-center">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="nome">Nome:</label>
                        </div>
                        <div class="d-flex">
                            <input type="text" name="nome" class="form-control" maxlength="50" id="nome" required>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <a href="/projeto-labbd/index.php" class="btn btn-secondary rounded mr-2">Voltar</a>
                    <button class="btn btn-success rounded ml-2" type="submit" name="action" value="create">Salvar</button>
                </div>
            </div>
        </form>

    </div>

    <hr>

    <div class="row">
        <div class="col-sm-12">
            <h3 class="text-center">Cadastros:</h3>
        </div>
    </div>

    <div class="container">
    <div class="row border p-2">
        <div class="col-sm-12">
            <?php
                    include('../db.php');
                    $query = "SELECT id_forma_pagto, nome FROM forma_pagto ORDER BY nome";
                    $resu = mysqli_query($con, $query);
                    
                    while ($reg = mysqli_fetch_array($resu)) {
                        echo "<form action='/projeto-labbd/controllers/forma-pagamento-controller.php' method='POST'>";
                        echo "<input type='hidden' name='id_forma_pagto' value='" . $reg['id_forma_pagto'] . "'>";

                        echo "<div class='row'>";
                        echo "<div class='col-sm-4'>Nome: <input type='text' maxlength='50' name='nome' value='" . $reg['nome'] . "' class='form-control'></div>";
                        echo "</div>";


                        echo "<input type='hidden' name='action' value='update'>";

                        
                        echo "<div class='row mt-2'>";
                        echo "<div class='col-sm-4'>";
                        
                        echo "<button class='btn btn-warning' type='submit'>Alterar</button>";
                        echo "</div>";

                        echo "<div class='col-sm-4'>";
                        
                        echo "<form action='/projeto-labbd/controllers/forma-pagamento-controller.php' method='POST'>";
                        echo "<input type='hidden' name='id_forma_pagto ' value='" . $reg['id_forma_pagto'] . "'>";
                        echo "<button class='btn btn-danger mt-2' type='submit' name='action' value='delete'>Deletar</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";

                        echo "</form>";

                        echo "<hr>";
                    }

                ?>
            </div>
        </div>
    </div>

    

</body>
</html>
