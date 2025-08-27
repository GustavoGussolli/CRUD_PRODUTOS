<?php

require_once(__DIR__ . "/../../model/Produto.php");
require_once(__DIR__ . "/../../controller/ProdutoController.php");
require_once(__DIR__ . "/../../model/Categoria.php"); // Adicionado
require_once(__DIR__ . "/../../model/Distribuidor.php"); // Adicionado

$msgErro = "";
$produto = null;

//Teste se o usuário já clicou no gravar
if(isset($_POST['nome'])) {
    //Já clicou no gravar
    //1- Capturar os dados do formulário
    $id                 = $_POST["id"]; 
    $nome               = trim($_POST['nome']) ? trim($_POST['nome']) : NULL;
    $preco              = is_numeric($_POST['preco']) ? $_POST['preco'] : NULL;
    $descricao          = trim($_POST['descricao']) ? trim($_POST['descricao']) : NULL;
    $quantidadeEstoque  = is_numeric($_POST['quantidade_estoque']) ? $_POST['quantidade_estoque'] : NULL;
    $idCategoria        = is_numeric($_POST['categoria']) ? $_POST['categoria'] : NULL;
    $idDistribuidor     = is_numeric($_POST['distribuidor']) ? $_POST['distribuidor'] : NULL;

    //Criar um objeto Produto para persistí-lo
    $produto = new Produto();
    $produto->setId($id);
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

    //2- Chamar o controller para alterar
    $produtoCont = new ProdutoController();
    $erros = $produtoCont->alterar($produto);

    if(! $erros) {
        //Redirecionar para o listar
        header("location: listar.php");
    } else {
        //Converter o array de erros para string
        $msgErro = implode("<br>", $erros);
    }


} else {
    //Usuário abriu a página para ver o formulário
    $id = 0;
    if(isset($_GET["id"]))
        $id = $_GET["id"];

    $produtoCont = new ProdutoController();
    $produto = $produtoCont->buscarPorId($id);

    if(! $produto) {
        echo "ID do produto é inválido!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }
}

include_once(__DIR__ . "/form.php");
