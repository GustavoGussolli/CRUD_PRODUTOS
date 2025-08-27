<?php

//Mostrar erros do PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Configurar essas variáveis de acordo com o seu ambiente
define("DB_HOST", "127.0.0.1:3307");
define("DB_NAME", "db_produtos"); // Alterado para db_produtos
define("DB_USER", "root");
define("DB_PASSWORD", "");

//Configuração do ambiente
define("AMB_DEV", true);
//define("AMB_DEV", false);
