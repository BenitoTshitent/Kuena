<?php
/**
 * Created by PhpStorm.
 * User: Adrien
 * Date: 24/05/2018
 * Time: 10:21
 */

if(isset($_SESSION,$_GET) && sizeof($_SESSION>0) && isset($_SESSION['kna_pseudo'],$_SESSION['kna_id'])
    && !empty($_SESSION['kna_pseudo']) && !empty($_SESSION['kna_id']) && !empty($_GET['i'])) {
    require_once ('modals/include.dao.php');
    $includeDao=new includeDao();
    extract($_GET);
    extract($_SESSION);
    //Il faut hasher la session id
    if($i==md5($kna_id)){
        //Recherche des pages et de la somme d'argent totale
        $allPages=$includeDao->getEspace($i);
        $somme=$includeDao->getSomCompte($i);
        require_once ('views/espace.view.php');
    }
    else{
        //Si la personne tente d'acceder a un compte qui ne lui appartient pas
        header('Location:index.php?p=error&ms=403');
    }
}
else{
    //header('Location:index.php');
    echo '<script language="Javascript">
           <!--
                 document.location.replace("index.php");
           // -->
     </script>';
}