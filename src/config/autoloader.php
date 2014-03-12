<?php
/**
 * Created by PhpStorm.
 * User: munizeverton
 * Date: 12/03/14
 * Time: 08:50
 */

function __autoload($class_name) {
    $class_name = str_replace("_", "/", $class_name).".php";
    require_once('lib/' . $class_name);
}