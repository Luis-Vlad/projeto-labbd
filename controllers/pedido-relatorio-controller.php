<?php
            include_once("../db.php");

            use Dompdf\Dompdf;

            require_once("../dompdf/autoload.inc.php");

            if (isset($_POST['action'])) {


                $data_inicio = isset($_POST['data_inicio']) ? $_POST['data_inicio'] : '';
                $data_final = isset($_POST['data_final']) ? $_POST['data_final'] : '';

                if (empty($data_inicio) || empty($data_final)) {
                    echo '<div class="alert alert-warning mt-4 text-center">Preencha o período corretamente.</div>';
                    die();
                }

                $query = "
                    SELECT 
                        p.id_pedido,
                        p.data,
                        c.nome AS cliente,
                        p.observacao,
                        f.nome AS forma_pagto,
                        p.prazo_entrega,
                        v.nome AS vendedor,
                        ip.qtde AS quantidade,
                        prod.nome AS produto,
                        prod.preco AS preco
                    FROM 
                        pedidos p
                    INNER JOIN clientes c ON p.id_cliente = c.id_clientes
                    INNER JOIN forma_pagto f ON p.id_forma_pagto = f.id_forma_pagto
                    INNER JOIN vendedor v ON p.id_vendedor = v.id_vendedor
                    INNER JOIN itens_pedido ip ON p.id_pedido = ip.id_pedido
                    INNER JOIN produto prod ON ip.id_produto = prod.id_produto
                    WHERE 
                        p.data BETWEEN '$data_inicio' AND '$data_final'
                    ORDER BY 
                        p.data, p.id_pedido";

                $resultado = mysqli_query($con, $query) or die("Erro ao buscar os dados: " . mysqli_error($con));

                $linha = "";
                while ($registro = mysqli_fetch_array($resultado)) {
                    $preco = htmlspecialchars($registro['preco']);
                    $linha .= "<tr>
                        <td>" . $registro['id_pedido'] . "</td>
                        <td>" . date("d/m/Y", strtotime($registro['data'])) . "</td>
                        <td>" . htmlspecialchars($registro['cliente']) . "</td>
                        <td>" . htmlspecialchars($registro['observacao']) . "</td>
                        <td>" . htmlspecialchars($registro['forma_pagto']) . "</td>
                        <td>" . htmlspecialchars($registro['prazo_entrega']) . "</td>
                        <td>" . htmlspecialchars($registro['vendedor']) . "</td>
                        <td>" . htmlspecialchars($registro['produto']) . "</td>
                        <td>" . htmlspecialchars($registro['quantidade']) . "</td>
                        <td>R$ " . number_format($preco, 2, ',', '.') . "</td>
                    </tr>";
                }

                $html = "
                    <h2 style='text-align: center;'>Relatório de Pedidos</h1>
                    <h5><b>Período: " . date("d/m/Y", strtotime($data_inicio)) . " a " . date("d/m/Y", strtotime($data_final)) . "</b></h3>
                    <table border='1' width='100%' style='border-collapse: collapse; font-family: Arial, sans-serif;'>
                        <thead>
                            <tr style='background-color: #f2f2f2;'>
                                <th>ID Pedido</th>
                                <th>Data</th>
                                <th>Cliente</th>
                                <th>Observação</th>
                                <th>Forma de Pagamento</th>
                                <th>Prazo Entrega</th>
                                <th>Vendedor</th>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Preço</th>
                            </tr>
                        </thead>
                        <tbody>" . $linha . "</tbody>
                    </table>
                ";

                // echo $html;
                // exit;


                $dompdf = new DOMPDF();
                $dompdf->load_html($html);
                $dompdf->setPaper('A4', 'landscape');
                $dompdf->render();


                $dompdf->stream(
                    "pedido-relatorio.pdf", 
                    ["Attachment" => false]
                );
                exit;
            }
?>