<?php
// Habilita o relatório de erros para desenvolvimento
ini_set('display_errors', 1); // Corrigido: 'display_erros' estava errado
error_reporting(E_ALL);

// Caminho base do projeto
define('BASE_PATH', dirname(__DIR__));

// Autoloader manual
spl_autoload_register(function ($class) {
    $base_dir = BASE_PATH . '/app/';
    $class = str_replace('\\', '/', $class); // transforma Core\Database em Core/Database
    $file = $base_dir . $class . '.php';

    if (file_exists($file)) {
        require_once $file;
    } else {
        die("Arquivo de classe não encontrado: $file");
    }
});

// Inicia o roteamento
use Core\Router;

$router = new Router();
$router->run();
