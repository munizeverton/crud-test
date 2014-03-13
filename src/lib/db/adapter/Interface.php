<?php

/**
 * Interface Adapter
 * @author Everton Muniz <munizeverton@gmail.com>
 * @version 1.0
 * @package CRUD
 */

interface Db_Adapter_Interface {

    /**
     * @param $config
     * @return mixed
     */
    static function getInstance($config);

}