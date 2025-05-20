<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    private static $instance;

    public static function getInstance()
    {
        if (!self::$instance) {
            $config = require BASE_PATH . '/config/.env.php';

            $dsn = 'mysql:host=' . $config['DB_HOST'] . ';dbname=' . $config['DB_NAME'] . ';charset=' . $config['DB_CHARSET'];

            try {
                self::$instance = new PDO($dsn, $config['DB_USER'], $config['DB_PASSWORD']);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Erro na conexão com o banco: " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
