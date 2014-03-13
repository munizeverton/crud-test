<?php

require_once('config/index.php');


$Pagina = new Pagina(new Db_Connection());
$paginas = $Pagina->fetchAll();


$content = 'list';
include('views/layout.php');