<?php
/**
 * Arquivo que manipula o cadastro
 * @author Everton Muniz <munizeverton@gmail.com>
 */

require_once('config/index.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (empty($_POST['title'])){
        $errorField[] = 'title';
        $result = false;
    }

    if (empty($_POST['url'])){
        $errorField[] = 'url';
        $result = false;
    }

    if (!isset($errorField)){
        $Pagina = new Pagina(new Db_Connection());
        $Pagina->setTitle(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
        $Pagina->setUrl(filter_var($_POST['url'], FILTER_SANITIZE_URL));
        $Pagina->setDescription(filter_var($_POST['description'], FILTER_SANITIZE_STRING));
        $Pagina->setBody(filter_var($_POST['body'], FILTER_SANITIZE_STRING));
        $Pagina->setAuthor(filter_var($_POST['author'], FILTER_SANITIZE_STRING));

        $result = $Pagina->insert();
    }

    if ($result){
        $msg = 'Página gravada com sucesso!';
    }else{
        $msg = 'Não foi possível gravar. Tente novamente';
    }

}

$content = 'add';
include('views/layout.php');