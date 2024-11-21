<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Projeto Lab. Banco de Dados - Clientes</title>
</head>
<body>

    <h1 class="text-center bg-primary text-white mb-5">Clientes</h1>

    <div class="container">
        
        <form class="row" action="/projeto-labbd/controllers/clientes-controller.php" method="POST">
            <div class="col-12 text-center">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="nome">Nome:</label>
                        </div>
                        <div class="d-flex">
                            <input type="text" name="nome" id="nome" class="form-control" maxlength="50" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="endereco">Endereço:</label>
                        </div>
                        <div class="d-flex">
                            <input type="text" name="endereco" id="endereco" class="form-control" maxlength="100" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="numero">Número:</label>
                        </div>
                        <div class="d-flex">
                            <input type="text" name="numero" id="numero" class="form-control" maxlength="10" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="bairro">Bairro:</label>
                        </div>
                        <div class="d-flex">
                            <input type="text" name="bairro" id="bairro" class="form-control" maxlength="50" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="cidade">Cidade:</label>
                        </div>
                        <div class="d-flex">
                            <input type="text" name="cidade" id="cidade" class="form-control" maxlength="20" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="estado">Estado:</label>
                        </div>
                        <div class="d-flex">
                            <select name="estado" id="estado" class="form-control" required>
                                <option value="">Selecione um Estado</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="email">Email:</label>
                        </div>
                        <div class="d-flex">
                            <input type="email" name="email" id="email" class="form-control" maxlength="100" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="cpf_cnpj">CPF/CNPJ:</label>
                        </div>
                        <div class="d-flex">
                            <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control" maxlength="20" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="rg">RG:</label>
                        </div>
                        <div class="d-flex">
                            <input type="text" name="rg" id="rg" class="form-control" maxlength="20" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="telefone">Telefone:</label>
                        </div>
                        <div class="d-flex">
                            <input type="tel" name="telefone" id="telefone" class="form-control" maxlength="20" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="celular">Celular:</label>
                        </div>
                        <div class="d-flex">
                            <input type="tel" name="celular" id="celular" class="form-control" maxlength="20" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="data_nasc">Data de Nascimento:</label>
                        </div>
                        <div class="d-flex">
                            <input type="date" name="data_nasc" id="data_nasc" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="salario">Salário:</label>
                        </div>
                        <div class="d-flex">
                            <input type="number" name="salario" id="salario" class="form-control" maxlength="10" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="idade">Idade:</label>
                        </div>
                        <div class="d-flex">
                            <input type="number" name="idade" id="idade" class="form-control" maxlength="10" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex">
                            <label for="tipo">Tipo:</label>
                        </div>
                        <div class="d-flex">
                            <input type="text" name="tipo" id="tipo" class="form-control" maxlength="50" required>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="action" value="create">

                <div class="d-flex justify-content-center mt-3">
                    <a href="/projeto-labbd/index.php" class="btn btn-secondary rounded mr-2">Voltar</a>
                    <button class="btn btn-success rounded ml-2" type="submit">Incluir</button>
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
            <div class="col-sm-12 mt-3 mb-3">
                <?php
                    include('../db.php');
                    $query = "SELECT id_clientes, nome, numero, bairro, endereco, cidade, estado, telefone, email, cpf_cnpj, rg, celular, data_nasc, salario, idade, tipo FROM clientes ORDER BY nome";
                    $resu = mysqli_query($con, $query);

                    while ($reg = mysqli_fetch_array($resu)) {
                        echo "<form action='/projeto-labbd/controllers/clientes-controller.php' method='POST'>";
                        echo "<input type='hidden' name='id_clientes' value='" . $reg['id_clientes'] . "'>";

                        echo "<div class='row'>";
                        echo "<div class='col-sm-4'>Nome: <input type='text' maxlength='50' name='nome' value='" . $reg['nome'] . "' class='form-control'></div>";
                        echo "<div class='col-sm-4'>Data de Nascimento: <input type='date' name='data_nasc' value='" . $reg['data_nasc'] . "' class='form-control'></div>";
                        echo "<div class='col-sm-4'>Endereço: <input type='text' maxlength='100' name='endereco' value='" . $reg['endereco'] . "' class='form-control'></div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='col-sm-4'>Numero: <input type='text' maxlength='10' name='numero' value='" . $reg['numero'] . "' class='form-control'></div>";
                        echo "<div class='col-sm-4'>Bairro: <input type='text' maxlength='50' name='bairro' value='" . $reg['bairro'] . "' class='form-control'></div>";
                        echo "<div class='col-sm-4'>Cidade: <input type='text' maxlength='20' name='cidade' value='" . $reg['cidade'] . "' class='form-control'></div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        
                        echo "<div class='col-sm-4'>
                            <label for='estado'>Estado:</label>
                            <select name='estado' id='estado' class='form-control' required>
                                <option value=''>Selecione um Estado</option>
                                <option value='AC' " . (($reg['estado'] == 'AC') ? 'selected' : '') . ">Acre</option>
                                <option value='AL' " . (($reg['estado'] == 'AL') ? 'selected' : '') . ">Alagoas</option>
                                <option value='AP' " . (($reg['estado'] == 'AP') ? 'selected' : '') . ">Amapá</option>
                                <option value='AM' " . (($reg['estado'] == 'AM') ? 'selected' : '') . ">Amazonas</option>
                                <option value='BA' " . (($reg['estado'] == 'BA') ? 'selected' : '') . ">Bahia</option>
                                <option value='CE' " . (($reg['estado'] == 'CE') ? 'selected' : '') . ">Ceará</option>
                                <option value='DF' " . (($reg['estado'] == 'DF') ? 'selected' : '') . ">Distrito Federal</option>
                                <option value='ES' " . (($reg['estado'] == 'ES') ? 'selected' : '') . ">Espírito Santo</option>
                                <option value='GO' " . (($reg['estado'] == 'GO') ? 'selected' : '') . ">Goiás</option>
                                <option value='MA' " . (($reg['estado'] == 'MA') ? 'selected' : '') . ">Maranhão</option>
                                <option value='MT' " . (($reg['estado'] == 'MT') ? 'selected' : '') . ">Mato Grosso</option>
                                <option value='MS' " . (($reg['estado'] == 'MS') ? 'selected' : '') . ">Mato Grosso do Sul</option>
                                <option value='MG' " . (($reg['estado'] == 'MG') ? 'selected' : '') . ">Minas Gerais</option>
                                <option value='PA' " . (($reg['estado'] == 'PA') ? 'selected' : '') . ">Pará</option>
                                <option value='PB' " . (($reg['estado'] == 'PB') ? 'selected' : '') . ">Paraíba</option>
                                <option value='PR' " . (($reg['estado'] == 'PR') ? 'selected' : '') . ">Paraná</option>
                                <option value='PE' " . (($reg['estado'] == 'PE') ? 'selected' : '') . ">Pernambuco</option>
                                <option value='PI' " . (($reg['estado'] == 'PI') ? 'selected' : '') . ">Piauí</option>
                                <option value='RJ' " . (($reg['estado'] == 'RJ') ? 'selected' : '') . ">Rio de Janeiro</option>
                                <option value='RN' " . (($reg['estado'] == 'RN') ? 'selected' : '') . ">Rio Grande do Norte</option>
                                <option value='RS' " . (($reg['estado'] == 'RS') ? 'selected' : '') . ">Rio Grande do Sul</option>
                                <option value='RO' " . (($reg['estado'] == 'RO') ? 'selected' : '') . ">Rondônia</option>
                                <option value='RR' " . (($reg['estado'] == 'RR') ? 'selected' : '') . ">Roraima</option>
                                <option value='SC' " . (($reg['estado'] == 'SC') ? 'selected' : '') . ">Santa Catarina</option>
                                <option value='SP' " . (($reg['estado'] == 'SP') ? 'selected' : '') . ">São Paulo</option>
                                <option value='SE' " . (($reg['estado'] == 'SE') ? 'selected' : '') . ">Sergipe</option>
                                <option value='TO' " . (($reg['estado'] == 'TO') ? 'selected' : '') . ">Tocantins</option>
                            </select>
                        </div>";

                        echo "<div class='col-sm-4'>Telefone: <input type='text' maxlength='20' name='telefone' value='" . $reg['telefone'] . "' class='form-control'></div>";
                        echo "<div class='col-sm-4'>Email: <input type='email' maxlength='100' name='email' value='" . $reg['email'] . "' class='form-control'></div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='col-sm-4'>CPF/CNPJ: <input type='text' maxlength='20' name='cpf_cnpj' value='" . $reg['cpf_cnpj'] . "' class='form-control'></div>";
                        echo "<div class='col-sm-4'>RG: <input type='text' maxlength='20' name='rg' value='" . $reg['rg'] . "' class='form-control'></div>";
                        echo "<div class='col-sm-4'>Celular: <input type='text' maxlength='20' name='celular' value='" . $reg['celular'] . "' class='form-control'></div>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='col-sm-4'>Salário: <input type='text' maxlength='10' name='salario' value='" . $reg['salario'] . "' class='form-control'></div>";
                        echo "<div class='col-sm-4'>Idade: <input type='text' maxlength='10' name='idade' value='" . $reg['idade'] . "' class='form-control'></div>";
                        echo "<div class='col-sm-4'>Tipo: <input type='text' maxlength='50' name='tipo' value='" . $reg['tipo'] . "' class='form-control'></div>";
                        echo "</div>";

                        
                        echo "<input type='hidden' name='action' value='update'>";

                        
                        echo "<div class='row mt-2'>";
                        echo "<div class='col-sm-4'>";
                        
                        echo "<button class='btn btn-warning' type='submit'>Alterar</button>";
                        echo "</div>";

                        echo "<div class='col-sm-4'>";
                        
                        echo "<form action='/projeto-labbd/controllers/clientes-controller.php' method='POST'>";
                        echo "<input type='hidden' name='id_clientes' value='" . $reg['id_clientes'] . "'>";
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
