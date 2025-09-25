<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Distribuidor.php");

class DistribuidorDAO
{

    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Connection::getConnection();
    }

    public function listar()
    {
        $sql = "SELECT * FROM distribuidores ORDER BY nome";
        $stm = $this->conexao->prepare($sql);
        $stm->execute();
        $resultado = $stm->fetchAll();

        $distribuidores = $this->map($resultado);
        return $distribuidores;
    }

    private function map($resultado)
    {
        $distribuidores = array();
        foreach ($resultado as $r) {
            $distribuidor = new Distribuidor();
            $distribuidor->setId($r['id']);
            $distribuidor->setNome($r['nome']);

            array_push($distribuidores, $distribuidor);
        }

        return $distribuidores;
    }

}
