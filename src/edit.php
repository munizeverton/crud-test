<?php

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
        $Pagina->setId(filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT));
        $Pagina->setTitle(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
        $Pagina->setUrl(filter_var($_POST['url'], FILTER_SANITIZE_URL));
        $Pagina->setDescription(filter_var($_POST['description'], FILTER_SANITIZE_STRING));
        $Pagina->setBody(filter_var($_POST['body'], FILTER_SANITIZE_STRING));
        $Pagina->setAuthor(filter_var($_POST['author'], FILTER_SANITIZE_STRING));

        $result = $Pagina->update();
    }

    if ($result){
        $msg = 'Página alterada com sucesso!';
        $Pagina = new Pagina(new Db_Connection());
        $Pagina->setId(filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT));
        $result = $Pagina->find();
    }else{
        $msg = 'Não foi possível alterar. Tente novamente';
    }

}else{
    $Pagina = new Pagina(new Db_Connection());
    $Pagina->setId(filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT));
    $result = $Pagina->find();

    if (!$result){
        $msg = 'Página não localizada';
    }
}

$content = 'edit';
include('views/layout.php');