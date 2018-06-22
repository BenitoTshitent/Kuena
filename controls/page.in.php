<?php
 //Ajout d'une page a l'espace membre
if(isset($_POST['range']) && !empty($_POST['range'])){
    require_once ('../modals/page.class.php');
    require_once ('../modals/page.dao.php');
    extract($_POST);
    session_start();
    extract($_SESSION);
    $pageDao=new pageDao();
    $page=new page(0,0,0,0,0,null);
    $value=$pageDao->getExistence($kna_id,$range);
    if($value){
        echo 'Désolé, il semblerait que cette page soit déjà dans votre espace';
        exit();
    }
    else{
        $page->setIdPage($range);
        $page->setIdMembre($kna_id);
        $value=$pageDao->addPage($page);
        if ($value) {
            echo 'success';
            exit();
        }
        else{
            //echo 'Un problème est survenu lors de l\'ajout de cette page';
           // exit();
        }

    }
}
//Visite d'une page generale
else if(isset($_POST['visite']) && !empty($_POST['visite'])){
    require_once ('../modals/page.dao.php');
    extract($_POST);
    $pageDao=new pageDao();
    $ipadress=$pageDao->getIp();
    //Verification de la visite de la page
    $value=$pageDao->getVisited($ipadress,$visite);
    if(!$value){
        //Ajout de la visite( consideration de la visite)
        $value=$pageDao->addVisite($ipadress,$visite);
        echo 'success';
        exit();
    }


}
//Visite d'une page unit, celle d'un membre
else if(isset($_POST['visited'],$_POST['i']) && !empty($_POST['visited']) && !empty($_POST['i'])){
    require_once ('../modals/page.dao.php');
    extract($_POST);
    $pageDao=new pageDao();
    $ipadress=$pageDao->getIp();
    //Verification d'une visite ulterieure de la page
    $value=$pageDao->getVisited($ipadress,$visited);
    if(!$value){
        //Ajout de la visite
        $value=$pageDao->addVisitedUnit($visited,$i,$ipadress);
        if($value){
            echo 'success';
            exit();
        }
        else{
           // echo 'Merci pour cette enième visite !';
           // exit();
        }
    }
}

//Visite du site, concernant toutes les pages du site
else if(isset($_POST['all']) && !empty($_POST['all']) && $_POST['all']=='all'){
    require_once ('../modals/page.dao.php');
    extract($_POST);
    $pageDao=new pageDao();
    $ipadress=$pageDao->getIp();
    //Verification de la visite de la page durant les 24 dernieres heures
    $value=$pageDao->getSiteVisited($ipadress);
    if($value[0]>=24){
        $pageDao->addVisiteSite($ipadress);
    }
}


