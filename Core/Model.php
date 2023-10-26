<?php

namespace Core;

use PDO;
use \Core\Config;

/**
 * Model class interacts with mysql database 
 */
abstract class Model
{        
    /**
     * getDB method connects to the database via PDO 
     *
     * @return PDO
     */
    protected static function getDB() : PDO {
        $config = (new Config())->config;
        $dsn = 'mysql:host=' . $config["DB_HOST"] . ';dbname=' . $config["DB_NAME"] . ';charset=utf8';
        $db = new PDO($dsn, $config["DB_USER"], $config["DB_PASSWORD"]);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}