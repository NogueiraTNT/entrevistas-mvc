<?php
namespace App\Models;

use Core\Database;
use PDO;

class BaseModel
{
    protected $db;

    public function __construct()
    {
        $this->$db = Database::getInstance();
    }
}
