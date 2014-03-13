<?php
/**
 * Arquivo que manipula a exclusão
 * @author Everton Muniz <munizeverton@gmail.com>
 */

require_once('config/index.php');

$Pagina = new Pagina(new Db_Connection());
$Pagina->setId(filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT));
$paginas = $Pagina->delete();

header('Location: index.php');