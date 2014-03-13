<?php

/**
 * Classe Db_Connection
 * @author Everton Muniz <munizeverton@gmail.com>
 * @version 1.0
 * @package CRUD
 */
class Db_Connection {

    /**
     * @param $config
     * @return PDO
     */
    public function connect($config) {
        switch ($config['adapter']) {
            case "mysql":
                return Db_Adapter_Mysql::getInstance($config);
                break;
        }
    }

} 