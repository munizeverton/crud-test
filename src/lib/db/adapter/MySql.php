<?php

/**
 * Classe Db_Adapter_Mysql
 * @author Everton Muniz <munizeverton@gmail.com>
 * @version 1.0
 * @package CRUD
 */
class Db_Adapter_Mysql implements Db_Adapter_Interface {

    /**
     * @var object Instancia do objeto PDO
     */
    private static $instance;

    /**
     * @param $config
     * @return PDO
     */
    static function getInstance($config) {
        if (!isset(self::$instance)) {
            $dsn = $config['adapter'] . ":host=" . $config['hostname'] . ";dbname=" . $config['dbname'];
            try {
                $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
                self::$instance = new PDO($dsn, $config['user'], $config['password'], $options);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$instance;
    }
}