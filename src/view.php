<?php
/**
 * Arquivo que exibe uma página
 * @author Everton Muniz <munizeverton@gmail.com>
 */

require_once('config/index.php');

$Pagina = new Pagina(new Db_Connection());
$Pagina->setId(filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT));
$result = $Pagina->find();

if (!$result){
    $msg = 'Página não localizada';
}

$content = 'view';
include('views/layout.php');