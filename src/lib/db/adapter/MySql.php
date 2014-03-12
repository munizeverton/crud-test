<?php

class Db_Adapter_Mysql implements Db_Adapter_Interface {

    private static $instance;

    static function getInstance($config) {
        if (!isset(self::$instance)) {
            $dsn = $config['adapter'] . ":host=" . $config['hostname'] . ";dbname=" . $config['dbname'];
            try {
                self::$instance = new PDO($dsn, $config['user'], $config['password']);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$instance;
    }
}