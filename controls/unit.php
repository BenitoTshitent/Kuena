<?php
/**
 * Created by PhpStorm.
 * User: Adrien
 * Date: 24/05/2018
 * Time: 10:19
 */

if(isset($_GET['p'],$_GET['r'],$_GET['i']) && $_GET['p']=='unit' && !empty($_GET['r']) && !empty($_GET['i'])){
    require_once ('modals/include.dao.php');
    $includeDao=new includeDao();
    extract($_GET);
    $r=$r;
    $i=$i;
    //Verification, si le membre a reellement cette page
    $value=$includeDao->existedPageMember($r,$i);
    if($value){
        //Recuperation des informations sur la page unit
        $page=$includeDao->getPage($r);
        $page=$page[0];
        //Verification si la page donne un resultat
        if(!$page){
            header('Location:index.php?p=error&ms=404');
        }
        else{
            $contacts=$includeDao->getContacts($page->id_annonceur);
            $images=$includeDao->getImages($r);
            require_once ('views/unit.view.php');
        }

    }
    else{
        header('Location:index.php?p=error&ms=403');
    }

}else{
    header('Location:index.php');
}
