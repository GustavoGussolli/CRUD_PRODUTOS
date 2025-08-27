<?php
    require_once(__DIR__ . "/../../controller/ProdutoController.php");   

    //Chamar o controller para obter a lista de produtos
    $produtoCont = new ProdutoController();
    $lista = $produtoCont->listar();

    //print_r($lista);


    //Incluir o header
    include_once(__DIR__ . "/../include/header.php");
?>

<h3>Listagem de Produtos</h3> 

<div>
    <a href="inserir.php" class="btn btn-success mt-1 mb-3">Inserir</a>
</div>

<table class="table table-striped">
    <!-- Cabeçalho -->
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Descrição</th>
        <th>Qtd. Estoque</th>
        <th>Categoria</th>
        <th>Distribuidor</th>
        <th></th>
        <th></th>
    </tr>

    <!-- Dados -->
    <?php foreach($lista as $produto): ?>
        <tr>
            <td><?= $produto->getId() ?></td>
            <td><?= $produto->getNome() ?></td>
            <td><?= number_format($produto->getPreco(), 2, ',', '.') ?></td>
            <td><?= $produto->getDescricao() ?></td>
            <td><?= $produto->getQuantidadeEstoque() ?></td>
            <td><?= $produto->getCategoria() ?></td>
            <td><?= $produto->getDistribuidor() ?></td>
            <td>
                <a href="alterar.php?id=<?= $produto->getId() ?>">
                    <img src="../../img/btn_editar.png">
                </a> 
            </td>
            <td>
                <a href="excluir.php?id=<?= $produto->getId() ?>"
                    onclick="return confirm('Confirma a exclusão?');">
                    <img src="../../img/btn_excluir.png">
                </a>
            </td>
        </tr>
    <?php endforeach; ?>


</table>

<?php
    //Incluir o footer
    include_once(__DIR__ . "/../include/footer.php");   
?>
