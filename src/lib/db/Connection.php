<?php
/**
 * Created by PhpStorm.
 * User: munizeverton
 * Date: 12/03/14
 * Time: 08:09
 */

class Db_Connection {

    public function __construct($config) {
        switch ($config['adapter']) {
            case "mysql":
                return Db_Adapter_Interface::getInstance($config);
                break;
        }
    }

} 