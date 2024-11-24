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
                v.id_vendedor,
                v.nome AS vendedor,
                SUM(ip.qtde * prod.preco) AS total_vendido,
                v.perc_comissao,
                (SUM(ip.qtde * prod.preco) * v.perc_comissao / 100) AS comissao
            FROM 
                pedidos p
            INNER JOIN vendedor v ON p.id_vendedor = v.id_vendedor
            INNER JOIN itens_pedido ip ON p.id_pedido = ip.id_pedido
            INNER JOIN produto prod ON ip.id_produto = prod.id_produto
            WHERE 
                p.data BETWEEN '$data_inicio' AND '$data_final'
            GROUP BY 
                v.id_vendedor
            ORDER BY 
                v.nome";

        $resultado = mysqli_query($con, $query) or die("Erro ao buscar os dados: " . mysqli_error($con));

        $linha = "";
        while ($registro = mysqli_fetch_array($resultado)) {
            $total_vendido = htmlspecialchars($registro['total_vendido']);
            $comissao = htmlspecialchars($registro['comissao']);
            $linha .= "<tr>
                <td>" . htmlspecialchars($registro['vendedor']) . "</td>
                <td>R$ " . number_format($total_vendido, 2, ',', '.') . "</td>
                <td>R$ " . number_format($comissao, 2, ',', '.') . "</td>
            </tr>";
        }

        $html = "
            <h2 style='text-align: center;'>Relatório de Comissão dos Vendedores</h2>
            <h4 style='text-align: center'><b>Período: " . date("d/m/Y", strtotime($data_inicio)) . " a " . date("d/m/Y", strtotime($data_final)) . "</b></h3>
            <table border='1' width='100%' style='border-collapse: collapse; font-family: Arial, sans-serif;'>
                <thead>
                    <tr style='background-color: #f2f2f2;'>
                        <th>Vendedor</th>
                        <th>Total Vendido</th>
                        <th>Comissão Recebida</th>
                    </tr>
                </thead>
                <tbody>" . $linha . "</tbody>
            </table>
        ";

        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $dompdf->stream(
            "comissao-vendedores-relatorio.pdf", 
            ["Attachment" => false]
        );
        exit;
    }
?>
