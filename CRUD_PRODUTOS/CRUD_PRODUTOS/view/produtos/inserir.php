<?php

require_once(__DIR__ . "/../../model/Produto.php");
require_once(__DIR__ . "/../../controller/ProdutoController.php");
require_once(__DIR__ . "/../../model/Categoria.php"); // Adicionado
require_once(__DIR__ . "/../../model/Distribuidor.php"); // Adicionado

$msgErro = "";
$produto = null;

//Receber os dados do formulário
if(isset($_POST['nome'])) {
    //Usuário já clicou no gravar
    $nome               = trim($_POST['nome']) ? trim($_POST['nome']) : NULL;
    $preco              = is_numeric($_POST['preco']) ? $_POST['preco'] : NULL;
    $descricao          = trim($_POST['descricao']) ? trim($_POST['descricao']) : NULL;
    $quantidadeEstoque  = is_numeric($_POST['quantidade_estoque']) ? $_POST['quantidade_estoque'] : NULL;
    $idCategoria        = is_numeric($_POST['categoria']) ? $_POST['categoria'] : NULL;
    $idDistribuidor     = is_numeric($_POST['distribuidor']) ? $_POST['distribuidor'] : NULL;

    //Criar um objeto Produto para persistí-lo
    $produto = new Produto();
    $produto->setId(0);
    $produto->setNome($nome);
    $produto->setPreco($preco);
    $produto->setDescricao($descricao);
    $produto->setQuantidadeEstoque($quantidadeEstoque);

    if($idCategoria) {
        $categoria = new Categoria();
        $categoria->setId($idCategoria);
        $produto->setCategoria($categoria);
    } else
        $produto->setCategoria(NULL);

    if($idDistribuidor) {
        $distribuidor = new Distribuidor();
        $distribuidor->setId($idDistribuidor);
        $produto->setDistribuidor($distribuidor);
    } else
        $produto->setDistribuidor(NULL);

    //Chamar o DAO para salvar o objeto Produto
    $produtoCont = new ProdutoController();
    $erros = $produtoCont->inserir($produto);

    if(! $erros) {
        //Redirecionar para o listar
        header("location: listar.php");
    } else {
        //Converter o array de erros para string
        $msgErro = implode("<br>", $erros);
    }
}

include_once(__DIR__ . "/form.php");
