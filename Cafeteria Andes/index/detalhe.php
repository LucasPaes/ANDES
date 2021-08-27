<?php require_once("../conexao/conexao.php"); ?>
<?php
//testar parâmetr
if (isset($_GET['codigo'])) {
    $produtoID = $_GET['codigo'];
} else {
    header("location:listagem.php");
}
//consulta ao BD
$consulta = "SELECT * FROM produtos ";
$consulta .= " WHERE produtoID = {$produtoID} ";
$detalhes = mysqli_query($conecta, $consulta);

if (!$detalhes) {
    die("falha na consulta ao banco");
} else {
    $dados_detahes = mysqli_fetch_assoc($detalhes);
}
$produtoID = $dados_detahes['produtoID'];
$nomeproduto = $dados_detahes['nomeproduto'];
$descricao = $dados_detahes['descricao'];
$codigobarra = $dados_detahes['codigobarra'];
$tempoentrega = $dados_detahes['tempoentrega'];
$precorevenda = $dados_detahes['precorevenda'];
$precounitario = $dados_detahes['precounitario'];
$estoque = $dados_detahes['estoque'];
$imagemgrande = $dados_detahes['imagemgrande'];
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso PHP Integração com MySQL</title>

    <!-- estilo -->
    <link href="_css/estilo.css" rel="stylesheet">
    <link href="_css/produto_detalhe.css" rel="stylesheet">
</head>

<body>
    <?php include_once("../_incluir/topo.php"); ?>
    <?php include_once("../_incluir/funcoes.php"); ?>

    <main>
        <div id="detalhe_produto">
            <ul>
                <li class="imagem"><img src="<?= $imagemgrande ?>"></li>
                <li><h2><?= $nomeproduto ?></h2></li>
                <li>Descrição :<?= $descricao ?></li>
                <li>Codigo de Barras :<?= $codigobarra ?></li>
                <li>Tempo de Entrega : <?= $tempoentrega ?> dias</li>
                <li>Preço de Revenda : <?= real_format($precorevenda) ?></li>
                <li>Preço Unitário :<?= real_format($precounitario) ?></li>
                <li>Estoque :<?= $estoque ?></li>
                
                
            </ul>
        </div>
    </main>

    <?php include_once("../_incluir/rodape.php"); ?>
</body>

</html>

<?php
// Fechar conexao
mysqli_close($conecta);
?>