<?php
/**
 * Arquivo autoload de classes
 * @author Everton Muniz <munizeverton@gmail.com>
 */

function __autoload($class_name) {
    $class_name = str_replace("_", "/", $class_name).".php";
    require_once('lib/' . $class_name);
}