<?php

require_once(__DIR__ . "/../../controller/CategoriaController.php");
require_once(__DIR__ . "/../../controller/DistribuidorController.php");

$categoriaCont = new CategoriaController();
$categorias = $categoriaCont->listar();

$distribuidorCont = new DistribuidorController();
$distribuidores = $distribuidorCont->listar();

include_once(__DIR__ . "/../include/header.php");
?>

<h3><?= $produto && $produto->getId() > 0 ? 'Alterar' : 'Inserir' ?> 
        produto</h3>

<div class="row">

    <div class="col-6">
    
        <form method="POST" action="">

            <div>
                <label for="txtNome" class="form-label">Nome:</label>
                <input type="text" id="txtNome" name="nome"
                    placeholder="Informe o nome" class="form-control"
                    value="<?= $produto ? $produto->getNome() : '' ?>">
            </div>

            <div>
                <label for="txtPreco" class="form-label">Preço:</label>
                <input type="number" id="txtPreco" name="preco"
                    placeholder="Informe o preço" class="form-control"
                    value="<?= $produto ? $produto->getPreco() : '' ?>" step="0.01">
            </div>

            <div>
                <label for="txtDescricao" class="form-label">Descrição:</label>
                <textarea id="txtDescricao" name="descricao"
                    placeholder="Informe a descrição" class="form-control"
                    rows="3"><?= $produto ? $produto->getDescricao() : '' ?></textarea>
            </div>

            <div>
                <label for="txtQuantidadeEstoque" class="form-label">Quantidade em Estoque:</label>
                <input type="number" id="txtQuantidadeEstoque" name="quantidade_estoque"
                    placeholder="Informe a quantidade em estoque" class="form-control"
                    value="<?= $produto ? $produto->getQuantidadeEstoque() : '' ?>">
            </div>

            <div>
                <label for="selCategoria" class="form-label">Categoria:</label>
                <select name="categoria" id="selCategoria" class="form-select">
                    <option value="">----Selecione----</option>

                    <?php foreach($categorias as $c): ?>
                        <option value="<?= $c->getId() ?>" 
                        
                        <?php
                            if($produto && $produto->getCategoria() && 
                                $produto->getCategoria()->getId() == $c->getId())
                                echo "selected"; 
                        ?>

                        >
                            <?= $c ?><!-- Chama o toString da classe -->
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="selDistribuidor" class="form-label">Distribuidor:</label>
                <select name="distribuidor" id="selDistribuidor" class="form-select">
                    <option value="">----Selecione----</option>

                    <?php foreach($distribuidores as $d): ?>
                        <option value="<?= $d->getId() ?>" 
                        
                        <?php
                            if($produto && $produto->getDistribuidor() && 
                                $produto->getDistribuidor()->getId() == $d->getId())
                                echo "selected"; 
                        ?>

                        >
                            <?= $d ?><!-- Chama o toString da classe -->
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input type="hidden" name="id"
                value="<?= $produto ? $produto->getId() : 0 ?>">

            <div class="mt-2">
                <button type="submit" 
                    class="btn btn-success">Gravar</button>
            </div>

        </form>
    </div>

    <div class="col-6">
        <?php if($msgErro): ?>
            <div class="alert alert-danger">
                <?= $msgErro ?>
            </div>
        <?php endif; ?>
    </div>

</div> <!-- fecha a linha -->

<div class="mt-2">
    <a href="listar.php" class="btn btn-outline-primary">Voltar</a>
</div>


<?php
    include_once(__DIR__ . "/../include/footer.php");
?>
