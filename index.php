<?php

$title = (isset($_GET['p']))? $_GET['p'].' | kuenea' : "Kuenea";
include_once ('partials/header.php');
if (isset($_GET['p'])){
    $page = 'controls/'.$_GET['p'].'.php';
    if(file_exists($page)) {
        //Si la page existe, nous l'incluons
            include_once($page);
    }else{
        //Sinon la page n'existe pas, donc 404
        //$page = 'controls/error.php';
        //include_once($page);
        header('Location:index.php?p=error&ms=404');
    }
}
else{
    //Sinon nous incluons la page d'acceuil
    $page = 'controls/main.php';
    include_once($page);

}
include_once ('partials/footer.php');