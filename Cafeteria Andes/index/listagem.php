<?php require_once("../conexao/conexao.php"); ?>
<?php
//consulta
$produtos = "SELECT produtoID, nomeproduto, tempoentrega, precounitario,imagempequena ";
$produtos .= " FROM produtos ";
if (isset($_GET['produto'])) {
    $nomeproduto = $_GET['produto'];
    $produtos .= " WHERE nomeproduto LIKE '%{$nomeproduto}%'";
}
$resultado = mysqli_query($conecta, $produtos);

if (!$resultado) {
    die("falaha na consulta ao banco");
}
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso PHP Integração com MySQL</title>

    <!-- estilo -->
    <link href="_css/estilo.css" rel="stylesheet">
    <link href="_css/produtos.css" rel="stylesheet">
    <link href="_css/produto_pesquisa.css" rel="stylesheet">
</head>

<body>
    <?php include_once("../_incluir/topo.php"); ?>
    <?php include_once("../_incluir/funcoes.php"); ?>

    <main>
        <div id="janela_pesquisa">
            <form action="listagem.php" method="get">
                <input type="text" name="produto" placeholder="Nome do Produto">
                <input type="image" name="pesquisa" src="../_assets/botao_search.png">
            </form>
        </div>
        <div id="listagem_produtos">

            <?php
            while ($linha = mysqli_fetch_assoc($resultado)) {
            ?>
                <ul>
                    <li class="imagem">
                        <a href="detalhe.php?codigo=<?= $linha['produtoID'] ?>">
                            <img src="<?= $linha['imagempequena'] ?>">
                        </a>
                    </li>
                    <li>
                        <h3><?= $linha['nomeproduto'] ?></h3>
                    </li>
                    <li>Temmpo entrega : <?= $linha['tempoentrega'] ?></li>
                    <li> Preço Unitário : <?= real_format($linha['precounitario']) ?></li>
                </ul>
            <?php
            }
            ?>
        </div>
    </main>

    <?php include_once("../_incluir/rodape.php"); ?>
</body>

</html>

<?php
// Fechar conexao
mysqli_close($conecta);
?>