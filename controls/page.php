<?php
/**
 * Created by PhpStorm.
 * User: Adrien
 * Date: 16/04/2018
 * Time: 00:17
 */


if(isset($_GET['p'],$_GET['r']) && $_GET['p']=='page' && !empty($_GET['r']) ){
    require_once ('modals/include.dao.php');
    $includeDao=new includeDao();
    extract($_GET);
    $r=$r;
    //Verification si la page existe reellement
    $value=$includeDao->existedPage($r);
    if($value){
        //Recuperation des informations sur la page
        $page=$includeDao->getPage($r);
        $page=$page[0];
        //Verification si la page donne un resultat
        if(!$page){
            header('Location:index.php?p=error&ms=404');
        }
        else{
            $contacts=$includeDao->getContacts($page->id_annonceur);
            $images=$includeDao->getImages($r);
            require_once ('views/page.view.php');
        }

    }
    else{
        header('Location:index.php?p=error&ms=403');
    }

}else{
    header('Location:index.php');
}
