<?php

require_once(__DIR__ . "/../dao/DistribuidorDAO.php");

class DistribuidorController {

    private DistribuidorDAO $distribuidorDAO;

    public function __construct() {
        $this->distribuidorDAO = new DistribuidorDAO;
    }

    public function listar() {
        return $this->distribuidorDAO->listar();
    }

}
