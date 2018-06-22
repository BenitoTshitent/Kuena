<?php

require_once ('modals/include.dao.php');
$includeDao=new includeDao();
$recentes=$includeDao->getRecentes();
if(isset($_GET['r']) && is_numeric($_GET['r']) && !empty($_GET['r'])){
    $array=$includeDao->getPages($_GET['r']);
    $Allpages=$array[0];
    $pagination=$array[1];

}
else{
    $array=$includeDao->getPages(1);
    $Allpages=$array[0];
    $pagination=$array[1];
}
require_once ('views/pages.view.php');